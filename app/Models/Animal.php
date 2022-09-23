<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public $fillable = ['status', 'picture'];
    use HasFactory;
    public static function create($name, $picture, $userId, $status) {
        $model = new self();

        $model->name = $name;
        $model->picture = $picture;
        $model->user_id = $userId;
        $model->status = $status;

        $model->save();
        return $model;
    }
}
