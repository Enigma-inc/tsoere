<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class HomeController extends Controller
{
    public function index(){
         $tracks = Track::all();
         foreach ($tracks as $track) {
            $track->slug=str_slug($track->title.'-'.time());
            $track->save();
         }
         dd($tracks->toArray());
       return view('home.welcome')->with(['tracks'=>$tracks]);
    }
   public function trackHome($slug)
   {
       $tracks = Track::whereNotIn('id',[1,3,2])->get();
   }

}
