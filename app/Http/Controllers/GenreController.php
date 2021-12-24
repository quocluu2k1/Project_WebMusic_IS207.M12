<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Category::all();
        return view('genre')->with('genres',$genres);
    }
}
