<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return
     */
    public function index($slug)
    {
        $profile = Artist::where('slug',$slug)->first();
        return view('artist.home')->with('profile',$profile);
    }
}