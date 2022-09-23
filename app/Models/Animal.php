<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public static function create($name, $picture, $userId) {
        $model = new self();

        $model->name = $name;
        $model->picture = $picture;
        $model->user_id = $userId;

        $model->save();
        return $model;
    }
}
