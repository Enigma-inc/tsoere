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

    public function singleTrack($artistSlug,$trackSlug){
        //Retrive artist
       $artist = Artist::where('slug',$artistSlug)->first();
       //Get Track using artist relationship
       $track=$artist->tracks->where('slug',$trackSlug)->first();
       //Get Related Tracks
       $relatedTracks=$artist->tracks->whereNotIn('slug',[$trackSlug]);
        return view('artist.single-track')
                    ->with(['profile'=>$artist,
                            'track'=>$track,
                            'relatedTracks'=>$relatedTracks]);

       
    }
}
