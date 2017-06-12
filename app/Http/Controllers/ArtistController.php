<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    //artist profile creation form 
    public function edit()
    {
        return view('artist.edit-profile');
    }

    //avartar update form 
    public function update()
    { 
        $profile = Artist::find(auth()->id());
        return view('artist.update-avatar', compact('profile'));

    }

    //saving the avatar to the database and storing the actual file to a certain path

    public function upload_avatar(Request $request, Artist $profile)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $avatar = $request -> file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        $path = $avatar->storeAs('public/avatars',$filename);
        $profile->avatar = $path;
        $profile ->save();
        return redirect('/profile') -> with('success','Image upload successful');

    }
}
