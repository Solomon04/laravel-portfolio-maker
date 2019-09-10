<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'skills',
        'call_to_action'
    ];

    protected $casts = [
        'skills' => 'json',
        'call_to_action' => 'json'
    ];
}
