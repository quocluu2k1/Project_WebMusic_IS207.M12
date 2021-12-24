<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable = [
        'siid','siname','siphoto','story'
    ];
}
