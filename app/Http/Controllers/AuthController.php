<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(Request $request) {
        $rules =  $request->validate([
            'fio' => 'required',
            'login' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required', 
            'confirmed' => 'required'
        ]);
        
        $password = Hash::make($request->get('password'));

        $user = User::create(
            $request->get('fio'),
            $request->get('login'),
            $request->get('email'),
            $password
        );

        return view('home', ['success' => 'Регистрация прошла успешно']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $userId = Auth::user()->id;
            $isAdmin = Auth::user()->isAdmin();
 
            return redirect()
                ->route('user', [
                    'userId' => $userId,
                ])
                ->with('success', 'Авторизация прошла успешно');
        }
 
        return back()->withErrors([
            'login' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('login');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home')->with('success', 'Выход произошел успешно');
    }
}
