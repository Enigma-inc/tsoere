<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Track;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  return Auth::User()->profile()->get();
        $artist=Artist::find(Auth::User()->id);
        $tracks=$artist->tracks()->orderBy('created_at','DESC')->get();
        $trashed=$artist->tracks()
                ->onlyTrashed()
                ->orderBy('created_at','DESC')
                ->get();
        return view('profile.home')->with([
            'tracks'=>$tracks,
            'trashed'=>$trashed,
            'artist'=>$artist
            ]);
    }

    public function additionalInfo(Request $request, $id){
        $artist=Artist::find($id);
        $artist->booking_phone = $request->booking_phone;
        $artist->booking_email = $request->booking_email;
        $artist->about = $request->about;
        $artist->facebook = $request->facebook;
        $artist->instagram = $request->instagram;
        $artist->twitter = $request->twitter;
        $artist->affiliation = $request->affiliation;
        $artist->save();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
