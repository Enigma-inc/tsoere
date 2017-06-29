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
         $RecentlyAddedtracks = Track::where('created_at','>=',Carbon::now()->subDays(14))
         ->where('genre_id','=',$genre->id)
         ->get()
         ->shuffle();

        $artists=Artist::inRandomOrder()
         ->has('tracks','>',0)
         ->with('tracks')
         //->where('artist_category_id','=',$genre->id)
         ->withCount('tracks')
         ->take(12)
         ->get()
         ->shuffle();

         $mostDownloadedTracks = $this->getTrendingTracksinCategories(1,10);
        $mostSharedTracks=$this->getTrendingTracksinCategories(3,10);     
        $mostPlayedTracks = $this->getTrendingTracksinCategories(2,10);

       return view('track.category')->with([
                                            'artists'=>$artists,
                                            'tracks'=>$RecentlyAddedtracks,
                                            'category'=>$genre,
                                             'mostSharedTracks'=>$mostSharedTracks,
                                             'mostPlayedTracks'=>$mostPlayedTracks,
                                             'mostDownloadedTracks'=>$mostDownloadedTracks]);
    }
     private  function getTrendingTracksinCategories($ActionId,$limit=10){
          $action =Action::find($ActionId);

            $topTracks = DB::table('action_track')
                     ->select(DB::raw('count(*) as action_count, 
                        track_id '))
                     ->where('action_id', '=', $ActionId)
                     ->where('created_at','>=',Carbon::now()->subDays(30))
                     ->where('created_at','<=',Carbon::now())
                     ->orderBy('action_count', 'desc')
                     ->groupBy('track_id')
                     ->limit($limit)
                     ->get();

       return  Track::whereIn('id',$topTracks->pluck('track_id'))->orderBy($action->name,'DESC')->get();
    }
}
