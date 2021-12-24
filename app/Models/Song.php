<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // protected $table = 'songs';
    protected $fillable = [
        'sid','sname','url','sphoto','lyrics','nviews','cid','siid'
    ];
}
