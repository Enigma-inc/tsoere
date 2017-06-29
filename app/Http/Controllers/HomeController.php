<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;
use DB;
use App\Action;

class HomeController extends Controller
{
    public function index(){
         $RecentlyAddedtracks = Track::all()->shuffle();
         //return $RecentlyAddedtracks;
         $artists=Artist::inRandomOrder()
         ->has('tracks','>',0)
         ->with('tracks')
         ->withCount('tracks')
         ->take(2)
         ->get()
         ->shuffle();
        
        $mostSharedTracks=$this->getTrendingTracks(3,10);
        //dd($mostSharedTracks->toArray());
        

        $mostPlayedTracks = $this->getTrendingTracks(2,10);
        
        $mostDownloadedTracks = $this->getTrendingTracks(1,10);


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
    private  function getTrendingTracks($ActionId,$limit){
          $action =Action::find($ActionId);
          //dd($action->toArray());
            $topTracks = DB::table('action_track')
                     ->select(DB::raw('count(*) as action_count, 
                        track_id '))
                     ->where('action_id', '=', $ActionId)
                     ->orderBy('action_count', 'desc')
                     ->groupBy('track_id')
                     ->limit($limit)
                     ->get();

       return  Track::whereIn('id',$topTracks->pluck('track_id'))->orderBy($action->name,'DESC')->get();
    }


}
