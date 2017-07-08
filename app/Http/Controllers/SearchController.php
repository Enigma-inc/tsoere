<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;

class SearchController extends Controller
{
    

    public function index(Request $request)
    {
        $tracks =[];
        $artists =[];
        $query=$request->input('q');
        
        if ($request->has('q')) {
            $tracks = Track::search($query)->take(18)->paginate(9);
            $tracks->load('genre');
            $tracks->load('artist');

            $artists=Artist::search($query)
             ->take(3)
             ->get();
       
        }

            return view('track.search')->with([
             'tracks'=>$tracks,
             'artists'=>$artists,
             'searchWord'=>$query]);
    }
}
