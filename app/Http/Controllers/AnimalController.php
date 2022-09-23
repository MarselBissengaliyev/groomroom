<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    public function create(Request $request) {
        $userId = Auth::user()->id;

        $params = $request->validate([
            'name' => 'required',
            'picture' => 'required'
        ]);
        
        $picturePath = $request->file('picture')->store('animals');
        $params['picture'] = $picturePath;

        Animal::create(
            $params['name'],
            $params['picture'],
            $userId
        );

        return redirect()->route('user', ['userId' => $userId])->with('success', 'Заказ был успешно добавлен');
    }

    public function delete($animalId) {
        $userId = Auth::user()->id ?? null;
        if ($userId === null) {
            return redirect()->route('home')->with('error', 'У вас недостаточно прав, для этой операции.');
        }
        Animal::query()
            ->where('user_id', $userId)
            ->where('id', $animalId)
            ->delete();

        return redirect()
            ->route('user', ['userId' => $userId])
            ->with('success', 'Заказ успешно был удален');
    }
}
