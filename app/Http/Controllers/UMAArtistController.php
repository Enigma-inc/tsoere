<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddUmaArtistRequest;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\UmaArtist;
use App\UmaCategory;

class UmaArtistController extends Controller
{
      protected $disk;

      function __construct()
      {
          $this->disk= Storage::disk(env('FILE_SYSTEM', 's3'));
      }


    public function create(Request $request)
    {
        $umasCategories=UmaCategory::orderBy('name')->get();
        return view('umas.artists.create')
                ->with(['categories'=>$umasCategories]);
    }

    public function store(AddUmaArtistRequest $request)
    {

       $artwork=$request->file('artwork');
       $mp3=$request->file('mp3');
       $trackTitle=request('song');
       $artistName=request('name');
       $mp3Path="";
       $artworkPath="";
       if ($mp3) {
         $mp3Path='uma/songs/'.str_slug($artistName).'-'.str_slug($trackTitle).$mp3->getClientOriginalExtension();
         //Push Files To Storage
          $this->disk->put($mp3Path, file_get_contents($mp3), 'public');

       }
       if ( $artwork) {
         $artworkPath="uma/artworks/".str_slug($artistName).'-'.str_slug($trackTitle).$artwork->getClientOriginalExtension();
         //Create artwork
         $this->resizeArtwork($artwork,$artworkPath);
       }




      UmaArtist::create([
        'name'=>$artistName,
        'song_title'=>$trackTitle,
        'mp3'=> $mp3Path,
        'artwork'=>$artworkPath,
        'sms_code'=>request('code'),
        'video_code'=>request('youtube-id'),
        'category_id'=>request('category'),
        'slug'=>str_slug($artistName.'-'.$trackTitle)
      ]);



       return redirect('/');




    }
    private function resizeArtwork(UploadedFile $artwork,$artworkPath){

       //Resize Image
       $avatarStream= Image::make($artwork)
                ->fit(300, 300)
                ->stream()
                ->detach();

                //Push Files to Storage
       $this->disk->put($artworkPath,$avatarStream,'public');
    }

}
