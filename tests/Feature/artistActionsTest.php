<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Artist;
use App\Track;

class ArtistActionsTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $artist;

   public function setup(){
       parent::setup();

        $this->user= factory(User::class)->create();
        $this->artist=factory(Artist::class)->create(['user_id'=>$this->user->id]);
   }
     /** @test */
    public function an_artist_can_upload_a_track()
    {
        //Given We have and Artist and an instance of mp3 file
       // $this->be($this->user);
        //When we send a post request to /tracks/upload
        $track=factory(Track::class)->make(['artist_id'=>$this->artist->id])->toArray();
        $this->post('/tracks',$track)
            ->assertResponseOk();
        //then we expect mp3 file to be upload and path saved to db together with other details
    }
}
