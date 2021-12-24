<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Category;
use App\Models\Singer;
use App\Models\Playlist;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $newestSong = Song::join('Singers', 'Singers.siid', '=', 'Songs.siid')->take(5)->get();
        $top5Song = Song::join('Singers', 'Singers.siid', '=', 'Songs.siid')->orderBy('nviews', 'DESC')->take(5)->get();
        $featuredSinger = Singer::select('siname','siphoto')->join('Songs', 'Singers.siid', '=', 'Songs.siid')
        ->distinct()->orderBy('nviews', 'DESC')->take(5)->get();
        $songDefault = Song::join('Singers', 'Singers.siid', '=', 'Songs.siid')->orderBy('nviews', 'DESC')->take(1)->get();
        $playlists = Playlist::Where('id','=', Auth::user()->id)->get();
        return view('home')
                ->with('user',$user)
                ->with('newestSong',$newestSong)
                ->with('top5Song',$top5Song)
                ->with('featuredSinger',$featuredSinger)
                ->with('songDefault',$songDefault)
                ->with('playlists',$playlists);
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
    public function change_direction(){
        return Redirect('/');
    }
}
