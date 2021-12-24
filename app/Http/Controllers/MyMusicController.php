<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\Song_Playlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyMusicController extends Controller
{
    public function index(){
        // $view = view("mymusic",compact('content'))->render();
        // return response()->json(['html'=>$view]);
        // // return "abc";
        // return view('mymusic', compact('user'))->render();
        // $abc = view('mymusic');
        // return View("home")->with('views',$abc);
        $user = Auth::user();
        $playlists = Playlist::Where('id','=', Auth::user()->id)->get();
        return view('mymusic')->with('user',$user)->with('playlists',$playlists);
    }
    public function PlayMusic(Request $request){
        // $user = Auth::user();
        // $listSong = Playlist::Where('pid','=',$request->idPlaylist)->get();
        $listSong = Song_Playlist::join('songs','songs.sid','=','song__playlists.sid')
        ->join('Singers', 'Singers.siid', '=', 'Songs.siid')->Where('pid','=',$request->idPlaylist)->get();
        return response()->json($listSong);
        // return $request->idPlaylist;
        // return response()->json($playlist);
    }
}
