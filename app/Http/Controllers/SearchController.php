<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class SearchController extends Controller
{
        public function search(Request $request){
            $tracks =[];
        if($request->has('query')){
            
            $tracks = Track::search($request->input('query'))->get();
             $tracks->load('genre');
             $tracks->load('artist');
        }
        return  $tracks;
        }
}
