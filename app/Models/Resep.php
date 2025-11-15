<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'name',
        'image',
        'portion',
        'energy',
        'protein',
        'fat',
        'carbs',
        'ingridients',
        'tools',
        'how_to'
    ];
}
