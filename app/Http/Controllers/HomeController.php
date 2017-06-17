<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;

class HomeController extends Controller
{
    public function index(){
         $tracks = Track::all()->shuffle();
         $artists=Artist::all()->shuffle();
       return view('home.welcome')->with(['tracks'=>$tracks,'artists'=>$artists]);
    }


}
