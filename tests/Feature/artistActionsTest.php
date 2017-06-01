<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Artist;

class ArtistActionsTest extends TestCase
{

     /** @test */
    public function an_artist_can_upload_a_track()
    {
        //Given We have and Artist and an instance of mp3 file
        $user= factory(User::class)->create();
        factory(Artist::class)->create(['user_id'=>$user->id]);
        $this->be($user);
        //When we send a post request to /tracks/upload
        $track=factory(Track::class)->make()->toArray();
        $this->post('/tracks',$track)
            ->assertStatus(200);
        //then we expect mp3 file to be upload and path saved to db together with other details
    }
}
