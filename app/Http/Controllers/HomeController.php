<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;

class HomeController extends Controller
{
    public function index(){
         $tracks = Track::all()->shuffle();
         $artists=Artist::inRandomOrder()
         ->has('tracks','>',0)
         ->with('tracks')
         ->withCount('tracks')
         ->take(2)
         ->get()
         ->shuffle();
       return view('home.welcome')->with(['tracks'=>$tracks,'artists'=>$artists]);
    }

    protected function updateAvatars($artists){
        foreach ($artists as $artist) {
            if($artist->avatar=='/avatars/artist.png'){
                $artist->avatar="/images/logo.png";
                $artist->avatar_thumbnail="/images/logo-thumbnail.png";
                $artist->save();
            }
        }

    }


}
