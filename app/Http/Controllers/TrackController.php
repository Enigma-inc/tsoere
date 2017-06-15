<?php

namespace App\Http\Controllers;

use App\Track;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Transformers\TrackJsonTransformer;
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

    public function store(Request $request,$artistId, Track $track)
    {
        $this->validate($request, [
            'artwork' => 'required|max:2000',
            'mp3' => 'required |max:12288',
            'title' =>'required|max: 50',
        ]);
        //Variables
        $artistDir=Auth::user()->profile->slug;
        $mp3File=$request->file('mp3');
        $artwork=$request->file('artwork');
        $trackTitle=$request['title'];
        $currentTime=time();
        $mp3Path=$artistDir."/tracks/".str_slug($trackTitle).'-'.$currentTime.'.'.$mp3File->getClientOriginalExtension();
        $artworkPath=$artistDir."/artworks/".str_slug($trackTitle).'-'.$currentTime.'.'.$artwork->getClientOriginalExtension();
        $jsonPath =$artistDir. "/json/".str_slug($trackTitle)."-".$currentTime.".json";
        $jsonFile = str_slug($trackTitle)."-".$currentTime.".json";
    
       $resizedArtwork=$this->resizeArtwork($artwork);
        //Push Files To Storage 
         $this->disk->put($mp3Path, file_get_contents($mp3File),'public');
         $this->disk->put($artworkPath,file_get_contents($resizedArtwork),'public');

         //generate json file for the player
        $this->generateJsonFile($trackTitle, $artworkPath, $mp3Path,$jsonPath);
         
         //create track in database 
         $this->createTrack($trackTitle, $currentTime, $mp3Path, $artworkPath, $jsonPath, $genre='Hip Hop',$artistId);

         return redirect('/');

    }


  public function download(Track $track)
    {
        $fileName = $track->audio_path;
        $path=$this->disk->getDriver()->getAdapter()->applyPathPrefix($fileName);
        //Increment Downloads
        $track->increment('downloads');
       return response()->download($path); 

    }

    private function createTrack($trackTitle, $currentTime, $mp3Path, $artworkPath, $jsonPath, $genre='Hip Hop',$artistId)
    {
        Track::create([
        'title'=>$trackTitle,
        'slug'=>str_slug($trackTitle.'-'.$currentTime),
        'audio_path'=>$mp3Path,
        'artwork_path'=>$artworkPath,
        'json_path'=>$jsonPath,
        'genre'=>'Hip Hop',
        'artist_id'=>$artistId,
        ]);
    }

    private function generateJsonFile($trackTitle, $artworkPath, $mp3Path,$jsonPath)
    {
        $jsonContents = Fractal::item([
             'title'=>$trackTitle,
             'artwork'=>$this->disk->url($artworkPath),
             'mp3FilePath'=> $this->disk->url($mp3Path)], 
             new TrackJsonTransformer());
         
         Storage::put($jsonPath, $jsonContents -> toJson() );
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
