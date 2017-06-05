<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index($slug)
    {
        $profile = Artist::with('tracks')->where('slug',$slug)->first();
        return view('artist.home')->with('profile',$profile);
    }
}
