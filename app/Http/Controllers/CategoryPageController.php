<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Track;
use App\Genre;
use App\Action;
use App\Artist;
use DB;

class CategoryPageController extends Controller
{
    public function index($slug){
        $genre=Genre::where('slug','=',$slug)->first();
         $RecentlyAddedtracks = Track::with('genre','artist')->where('created_at','>=',Carbon::now()->subDays(14))
         ->where('genre_id','=',$genre->id)
         ->get()
         ->shuffle();

        $artists=Artist::withCount('tracks','category')->inRandomOrder()
         ->has('tracks','>',0)
         ->with('tracks')
         //->where('artist_category_id','=',$genre->id)
         ->withCount('tracks')
         ->take(12)
         ->get()
         ->shuffle();

         $mostDownloadedTracks = $this->getTrendingTracksinCategories(1,10,$slug);
        $mostSharedTracks=$this->getTrendingTracksinCategories(3,10,$slug);     
        $mostPlayedTracks = $this->getTrendingTracksinCategories(2,10,$slug);

       return view('track.category')->with([
                                            'artists'=>$artists,
                                            'tracks'=>$RecentlyAddedtracks,
                                            'category'=>$genre,
                                             'mostSharedTracks'=>$mostSharedTracks,
                                             'mostPlayedTracks'=>$mostPlayedTracks,
                                             'mostDownloadedTracks'=>$mostDownloadedTracks]);
    }
     private  function getTrendingTracksinCategories($ActionId,$limit=10,$categorySlug){
          $action =Action::find($ActionId);

            $topTracks = DB::table('action_track')
                     ->select(DB::raw('count(*) as action_count, 
                        action_track.track_id '))
                     ->join('tracks','action_track.track_id','tracks.id')
                     ->join('genres','tracks.genre_id','genres.id')
                     ->where('action_id', '=', $ActionId)
                     ->where('action_track.created_at','>=',Carbon::now()->subDays(30))
                     ->where('action_track.created_at','<=',Carbon::now())
                     ->where('genres.slug','=',$categorySlug)
                     ->orderBy('action_count', 'desc')
                     ->groupBy('action_track.track_id')
                     ->limit($limit)
                     ->get();

       return  Track::with('genre','artist')->whereIn('id',$topTracks->pluck('track_id'))->orderBy($action->name,'DESC')->get();
    }
}
