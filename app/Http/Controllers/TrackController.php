<?php

namespace App\Http\Controllers;

use App\Track;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Response;

use Auth;

class TrackController extends Controller
{
      protected $disk;
  
    function __construct(){
        $this->disk= Storage::disk(env('FILE_SYSTEM','s3'));
    }

    public function index()
    {
        //
    }

   
    public function create()
    {
        return view('track.upload');
    }

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

       $this->resizeArtwork($artwork);

        //Push Files To Storage 
         $this->disk->put($mp3Path, file_get_contents($mp3File),'public');
         $this->disk->put($artworkPath,file_get_contents($this->resizeArtwork($artwork)),'public');

         

         //Update Database
        Track::create([
        'title'=>$request['title'],
        'slug'=>str_slug($request['title'].'-'.time()),
        'audio_path'=>$mp3Path,
        'artwork_path'=>$artworkPath,
        'json_path'=>$artworkPath,
        'genre'=>'Hip Hop',
        'artist_id'=>$artistId,
        ]);
    }

  public function download(Track $track)
    {
        $fileName = $track->audio_path;
        $path=$this->disk->getDriver()->getAdapter()->applyPathPrefix($fileName);
        //Increment Downloads
        $track->increment('downloads');
       return response()->download($path); 

    }

    private function resizeArtwork(UploadedFile $artwork){
        $currentTime=time();
        $ext=$artwork->getClientOriginalExtension();
        $artworkPath='temp/'.$currentTime.'.'.$ext;
        $tempDisk=Storage::disk('public');

        //Save File Temporarily
        $path=  $tempDisk->put($artworkPath, file_get_contents($artwork),'public');
     
       //Resize Image
        Image::make(public_path().'/storage/'.$artworkPath)
                ->fit(300,300)
                ->save(public_path().'/storage/'.$artworkPath);
       return public_path().'/storage/'.$artworkPath;

                
    }
    
}
