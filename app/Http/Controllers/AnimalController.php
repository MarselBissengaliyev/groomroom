<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
            $userId,
            'new'
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

    public function updateStatus(Request $request, $animalId) {
        $params = $request->validate([
            "status-$animalId" => 'required',
            "picture-$animalId" => 'required'
        ]);

        $user = Auth::user();
        if (!$user->isAdmin()) {
            return redirect()->route('home')->with('error', 'У вас недостаточно прав.');
        }

        try {
            $animal = Animal::query()
                ->where('id', $animalId)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Такого заказа не сущесвует.');
        }

        $picturePath = $request->file("picture-$animalId")->store('animals');
        $params["picture-$animalId"] = $picturePath;

        $animal->update([
            'status' => $params["status-$animalId"],
            'picture' => $params["picture-$animalId"],
        ]);

        return redirect()->route('admin', ['adminId' => $user->id])->with('success', 'Статус успешно был изменен');
    }
}
