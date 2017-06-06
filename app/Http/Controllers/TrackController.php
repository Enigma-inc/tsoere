<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('track.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$artistId)
    {
  
        //Variables
        $artistDir=Auth::user()->profile->slug;
        $mp3File=$request->file('mp3');
        $artwork=$request->file('artwork');
        $trackTitle=$request['title'];
        $currentTime=time();
        $mp3Path=$artistDir."/tracks/".str_slug($trackTitle).'-'.$currentTime.'.'.$mp3File->getClientOriginalExtension();
        $artworkPath=$artistDir."/artworks/".str_slug($trackTitle).'-'.$currentTime.'.'.$artwork->getClientOriginalExtension();
        $disk=Storage::disk('local');

        //Push Files To Storage 
         $disk->put($mp3Path, file_get_contents($mp3File),'public');
         $disk->put($artworkPath,file_get_contents($artwork),'public');

         //Update Database
        Track::create([
        'title'=>$request['title'],
        'audio_path'=>$mp3Path,
        'artwork_path'=>$artworkPath,
        'json_path'=>$artworkPath,
        'genre'=>'Hip Hop',
        'artist_id'=>$artistId,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        //
    }
}
