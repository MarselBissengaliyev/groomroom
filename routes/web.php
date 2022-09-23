<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $animals = Animal::query()->where('status', 'finished')->get();
    return view('home', ['success' => null, 'animals' => $animals]);
})->name('home');

Route::post('/register', [AuthController::class, 'createUser'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/user/{userId}', function ($userId) {
    $authId = Auth::user() ? Auth::user()->id : null;
    $animals = Animal::query()->where('user_id', $authId)->orderBy('created_at')->get();
    if ($authId == $userId) {
        return view('user', ['success' => null, 'animals' => $animals]);
    } else {
        return redirect()->route('home')->with('error', 'Вы можете посетить только свой кабинет');
    }
})->name('user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/create', [AnimalController::class, 'create'])->name('create');

Route::get('/delete/{animalId}', [AnimalController::class, 'delete'])->name('delete');

Route::get('/admin/{adminId}', function($adminId) {
    $user = Auth::user() ?? null;
    if (!$user->isAdmin()) {
        return redirect()->route('home')->with('error', 'У вас недостаточно прав.');
    }
    if ($user->id != $adminId) {
        return redirect()->route('home')->with('error', 'Вы не можете перейти по данному url');
    }

    $animals = Animal::all();
    return view('admin', ['animals' => $animals, 'success' => null]);
})->name('admin');

Route::post('/update-animal/{animalId}', [
    AnimalController::class, 'updateStatus'])
    ->name('update-status');