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
    public function a_user_can_access_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

   
}
