<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index(){
        $songs = Song::join('Singers', 'Singers.siid', '=', 'Songs.siid')->orderBy('nviews', 'DESC')->take(10)->get();
        return view('rank')->with('songs',$songs);
    }
}
