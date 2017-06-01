<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_user_can_access_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_artist_can_access_his_her_profile_page()
    {   
        //given we have an authenticated user
        $user = factory('App\User') -> create();
        //Create Profile for this user
        factory('App\Artist')->create(['user_id'=>$user->id]);
        $this -> be($user);
 
        //this user can visit the profile page
         $this->get('/profile')
             ->assertStatus(200);
    }

    /** @test */

    public function unauthenticated_user_can_access_artist_public_page()
    {
        $artist = factory('App\Artist') ->create();

        $this ->get('/artist/'.$artist->slug)
              ->assertStatus(200);
    }

    /** @test */

    public function authenticated_artist_can_edit_profile(){
        $user = factory('App\User') -> create();

        factory('App\Artist') ->create(['user_id' => $user->id]);

        $this -> be($user); 

        $this ->get('/profile/edit')
              ->assertStatus(200);

    }

    /** @test */
    public function an_interested_artist_can_create_an_account()
    {
         $this -> get('/register')
               -> assertStatus(200);
    }

    /** @test */
    public function an_interested_artist_can_login()
    {
        $this ->get('/login')
              ->assertStatus(200);
    }

    /** @test */
    public function an_artist_can_login_and_gets_redirected_to_profile_page()
    {
        $user = factory('App\User') -> create(['email'=>'joe@example.com','password'=>'password']);
        factory('App\Artist') ->create(['user_id' => $user->id]);
        

        //Check if this  user can login
        $this->post('/login',['email'=>'joe@example.com','password'=>'password'])
             ->seePageIs('/profile');        
    }

    /** @test */
    public function an_authenticated_user_can_update_avartar()
    {
        $user = factory('App\User') -> create();

        factory('App\Artist') ->create(['user_id' => $user->id]);

        $this -> be($user);

            $this ->get('/update-avatar')
                  ->assertStatus(200);
    }

    /** @test */
    public function authenticated_artist_updates_an_avatar_and_gets_redirected_to_profile(){
        $user = factory('App\User') -> create();

        factory('App\Artist') ->create(['user_id' => $user->id]);

        $this -> be($user);

    }
}
