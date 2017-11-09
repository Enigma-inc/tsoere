<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\UmaArtistTransformer;
use App\Transformers\UmaCategoryTransformer;
use App\UmaArtist;
use App\UmaCategory;


class UmasController extends Controller
{
    public function index()
    {
        $artistCategories=UmaCategory::with(['artists'])
                ->inRandomOrder()
                ->get()
                ->shuffle();             ;
        return view('umas.index')->with(['artistCategories'=> UmaCategoryTransformer::transform($artistCategories)]);
    }
    public function getSingleSong($slug)
    {
         $singleArtist=UmaArtist::with(['category'])
                ->where('slug','=',$slug)
                ->get();  
        return view('umas.single-artist')->with(['artist'=> UmaArtistTransformer::transform($singleArtist)]);
    }
}
