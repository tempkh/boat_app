<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $fillable = [
        'name', 'description', 'image'
    ];
}
