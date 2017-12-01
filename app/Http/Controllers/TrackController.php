<?php

namespace App\Http\Controllers;

use App\Track;
use App\Artist;
use App\Genre;
use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Transformers\TrackJsonTransformer;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Response;
use App\Http\Requests\TrackUploadRequest;
use Carbon\Carbon;



use Auth;

class TrackController extends Controller
{
    protected $disk;
  
    function __construct()
    {
        $this->disk= Storage::disk(env('FILE_SYSTEM', 's3'));
    }


   

   
    public function create()
    {
        $genres=Genre::all();
        return view('track.upload')->with(['genres'=>$genres]);
    }

    public function store(TrackUploadRequest $request, $artistId)
    {
        //Variables
        $artistDir=Auth::user()->profile->slug;
        $mp3File=$request->file('mp3');
        $artwork=$request->file('artwork');
        $trackTitle=$request['title'];
        $genre=$request['genre'];
        $currentTime=time();
        $mp3FileName=str_slug($trackTitle).'-'.$currentTime.'.'.$mp3File->getClientOriginalExtension();        
        $mp3Path=$artistDir."/tracks/".$mp3FileName;
        $artworkPath=$artistDir."/artworks/".str_slug($trackTitle).'-'.$currentTime.'.'.$artwork->getClientOriginalExtension();
        $jsonPath =$artistDir. "/json/".str_slug($trackTitle)."-".time().".json";
        $jsonFile = str_slug($trackTitle)."-".$currentTime.".json";
    
       $resizedArtwork=$this->resizeArtwork($artwork,$artworkPath);

        //Push Files To Storage
         $this->disk->put($mp3Path, file_get_contents($mp3File), 'public');

         //generate json file for the player
         $this->generateJsonFile($trackTitle, $artworkPath, $mp3Path,$jsonPath);
         
         //create track in database 
         $this->createTrack($trackTitle, $currentTime, $mp3Path, $artworkPath, $jsonPath, $genre,$artistId);

         return redirect('/');

    }

    //title update and artwork update routes
    public function artworkUpdate(Request $request,$id){
        $artistDir=Auth::user()->profile->slug;
        $track = Track::find($id);
        $trackTitle=$track->title;
        $artwork=$request->file('artwork');
        $currentTime=time();
        $artworkPath=$artistDir."/artworks/".str_slug($trackTitle).'-'.$currentTime.'.'.$artwork->getClientOriginalExtension();
        $resizedArtwork=$this->resizeArtwork($artwork,$artworkPath);
        $track->artwork_path =$artworkPath;
        $track ->save();
        return back();
    }

    public function titleUpdate(Request $request,$id){
        $track = Track::find($id);
        $track->title = $request->title;
        $track->save();
        return back();
    }
    
    public function recordTrackPlay(Track $track){
           
            $track->increment('played');
                $track->actions()->attach(
                    Action::where('name','played')->get(),
                    ['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

            return $track; 
            
    }

    public function download(Track $track)
    {
      $fileName = $track->audio_path;
      $stream= $this->disk->readStream($fileName);
      $trackAction = Action::where('name','downloads')->first();
        //Increment Downloads
     $track->increment('downloads');
     $track->actions()->attach($trackAction->id,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
     

    return \Response::stream(function() use($stream){
           fpassthru($stream);

       },200,[
           "Content-Type"=>$this->disk->getMimeType($fileName),
           "Content-Length"=>$this->disk->getSize($fileName),
           "Content-disposition"=> "attachment; filename=\"".str_slug($track->title).".mp3\""
       ]);
         

    }
    private function createTrack($trackTitle, $currentTime, $mp3Path, $artworkPath, $jsonPath, $genre,$artistId)
    {
        Track::create([
        'title'=>$trackTitle,
        'slug'=>str_slug($trackTitle.'-'.$currentTime),
        'audio_path'=>$mp3Path,
        'artwork_path'=>$artworkPath,
        'json_path'=>$jsonPath,
        'genre_id'=>$genre,
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
         
       $this->disk->put($jsonPath,$jsonContents->toJson(),'public');
    }

    private function resizeArtwork(UploadedFile $artwork,$artworkPath){

     //   dd($artwork);
     
       //Resize Image
       $avatarStream= Image::make($artwork)
                ->fit(300, 300)
                ->stream()
                ->detach();

                //Push Files to Storage
       $this->disk->put($artworkPath,$avatarStream,'public');
    }

    public function trash($id)
    {
        $trackDeleted=Track::find($id)
                            ->delete();
        
            if ( $trackDeleted) {
            return(response('track trashed',200));
        } else {
            return (response('forbidden',403));
        }  
    }
    //untrash track
    public function untrash($id){
        $trackUntrashed=Track::withTrashed()->find($id)->restore();
        
        if ( $trackUntrashed) {
            return(response('track restored',200));
        } else {
            return (response('forbidden',403));
        }   
    }
    //enable and disable downloads
    public function downloadsDisable($id){
        $downloadableTrack=Track::find($id);
        $downloadableTrack->downloadable = 0;
        $downloadableTrack->save();
    }

    public function downloadsEnable($id){
        $downloadDisabledTrack = Track::find($id);

            $downloadDisabledTrack->downloadable=true;        
        $downloadDisabledTrack->save(); 


    }
}
