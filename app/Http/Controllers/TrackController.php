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

       $this->resizeArtwork($artwork);

        //Push Files To Storage 
         $this->disk->put($mp3Path, file_get_contents($mp3File),'public');
         $this->disk->put($artworkPath,file_get_contents($this->resizeArtwork($artwork)),'public');

         

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

  public function download(Artist $artist,Track $track)
    {
        $fileName = $track->audio_path;
        $filePath = storage_path().'/app/public/' . $fileName;

        $file=$this->disk->get($fileName);
        $fileMimeType=$this->disk->mimeType($fileName);

        return response()->download($filePath);
        return (new Response($file, 200))
              ->header('Content-Type', $fileMimeType);

        dd($this->disk->mimeType($fileName));


        if( file_exists('storage/'.$fileName)){
            $headers = array(
                'Content-Type: '.Storage::mimeType('/'.$fileName),
            );
            return response()->download($filePath, $fileName,$headers);
            
        }
        else{
            return back();
        }

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
