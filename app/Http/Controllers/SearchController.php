<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Song;
use App\Models\Singer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        // $html = View('mymusic')->render();
        // return Response::json(['html' => $html]);
        $keyword = $request->keyword;
        $resultSong = Song::join('Singers', 'Singers.siid', '=', 'Songs.siid')
        ->Where('sname','like','%'.$keyword.'%')->get();

        return view('SearchResult')->with('resultSong',$resultSong);
        // return view('SearchResult');
        
    }
    public function searchSinger(Request $request){
        $keyword = $request->keyword;
        $resultSinger = Singer::Where('siname','like','%'.$keyword.'%')->get();
        return view('SearchResultSinger')->with('resultSinger',$resultSinger);
    }
    public function searchGenre(Request $request){
        $keyword = $request->keyword;
        $resultGenre = Category::Where('cname','like','%'.$keyword.'%')
        ->orWhere('cdescription','like','%'.$keyword.'%')->get();
        return view('SearchResultGenre')->with('resultGenre',$resultGenre);
    }
}
