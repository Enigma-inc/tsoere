<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{

    public function index($slug)
    {

        $profile = Artist::where('slug',$slug)->first();
        return view('artist.home')->with('profile',$profile);
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
        $avatar = $request -> file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        $path = $avatar->storeAs('public/avatars',$filename);
        $profile->avatar = $path;
        $profile ->save();
        return redirect('/profile');
    }
}
