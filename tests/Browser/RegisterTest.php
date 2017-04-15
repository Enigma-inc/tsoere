<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{

    public function testRegister()
    {
        $this->browse(function(Browser $browser){
            $browser->visit('/register')
                    ->type('name','mokoenaneo')
                    ->type('email','neo@enigma.co.ls')
                    ->type('password','123456789')
                    ->type('password_confirmation','123456789')
                    ->clickLink('Register')
                    ->waitForLink('/home')
                    ->assertSee('Dashboard');

        });
    }
}
