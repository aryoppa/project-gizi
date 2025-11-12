<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'path', 'method', 'ip', 'session_id', 'user_agent', 'visited_at'
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public $timestamps = true;
}
