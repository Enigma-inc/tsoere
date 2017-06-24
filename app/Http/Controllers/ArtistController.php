<?php

namespace App\Http\Controllers;

use App\Track;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

use Auth;

class ArtistController extends Controller
{

    protected $disk;
    function __construct()
    {
        $this -> disk= Storage::disk(env('FILE_SYSTEM', 'S3'));
    }

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
        $profileDir = Auth::user()->profile->slug; 
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ]);
        $avatar = $request -> file('avatar');
        $currentTime = time();
        $avatarPath=$profileDir."/avatars/".$currentTime.'.'.$avatar->getClientOriginalExtension();
          $avatarThumnailPath=$profileDir."/avatars/".$currentTime.'-thumbnail.'.$avatar->getClientOriginalExtension();
        $resizedAvatar = $this->resizeAvatar($avatar,$avatarPath,$avatarThumnailPath);
/*
        //Update Database
        $profile->avatar = $avatarPath;
        $profile->avatar_thumbnail = $avatarThumnailPath;
        $profile -> save();*/

        return redirect('/profile') -> with('success','Image upload successful');


    }

        private function resizeAvatar(UploadedFile $avatar,$avatarPath,$avatarThumnailPath){
       //Resize Image
               // dd(sprintf("%/%s", $this->baseDir, $this->$avatar));
       
        $avatarStream =Image::make($avatar)
                ->fit(300,300)
                ->stream()
                ->detach();

        //Create a thumbnail
        $avatarThumbnailStream= Image::make($avatar)
                ->fit(80,80)
                ->stream()
                ->detach();

        //Push Files to Storage
        $this->disk->put($avatarPath,$avatarStream,'public');
        $this->disk->put($avatarThumnailPath,$avatarThumbnailStream,'public');
    }
}
