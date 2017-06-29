<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;
use DB;
use Carbon\Carbon;
use App\Action;

class HomeController extends Controller
{
    public function index(){
         $RecentlyAddedtracks = Track::with('genre','artist')->where('created_at','>=',Carbon::now()->subDays(14))
         ->get()
         ->shuffle();
        // return $RecentlyAddedtracks;
         $artists=Artist::withCount('tracks','category')->inRandomOrder()
         ->has('tracks','>',0)
         ->withCount('tracks')
         ->take(12)
         ->get()
         ->shuffle();
         
        $mostDownloadedTracks = $this->getTrendingTracks(1,10);
        $mostSharedTracks=$this->getTrendingTracks(3,10);     
        $mostPlayedTracks = $this->getTrendingTracks(2,10);


       return view('home.welcome')->with(['tracks'=>$RecentlyAddedtracks,
                                          'artists'=>$artists,
                                          'mostSharedTracks'=>$mostSharedTracks,
                                          'mostPlayedTracks'=>$mostPlayedTracks,
                                          'mostDownloadedTracks'=>$mostDownloadedTracks]);
    }

    protected function updateAvatars($artists){
        foreach ($artists as $artist) {
            if($artist->avatar=='/avatars/artist.png'){
                $artist->avatar="/images/logo.png";
                $artist->avatar_thumbnail="/images/logo-thumbnail.png";
                $artist->save();
            }
        }

    }

/*
   Track Actions Ids
   1==> Downloaded
   2==> Played
   3==> Shared
*/
    private  function getTrendingTracks($ActionId,$limit=10){
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

       return  Track::with('genre','artist')->whereIn('id',$topTracks->pluck('track_id'))->orderBy($action->name,'DESC')->get();
    }


}
