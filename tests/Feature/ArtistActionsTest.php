<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArtistActionsTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function an_artisrt_can_create_a_track()
    {
        //Given we have an artist
             $user = factory('App\User') -> create();
             factory('App\Artist')->create(['user_id'=>$user->id]);

        //When we make a post to create a track 
        $track = factory('App\Track')->make();
        //We expect to see the track title on the list of tracks
    }

   
}
