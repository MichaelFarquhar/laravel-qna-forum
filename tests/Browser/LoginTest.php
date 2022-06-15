<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_login_using_login_button()
    {
        $this->browse(function ($browser) {
            $browser->visitRoute('login')
                    ->clickLink('Login')
                    ->type('email', 'test@test.com')
                    ->type('password', 'password')
                    ->click('@login-button')
                    ->assertRouteIs('dashboard');
        });
    }
}
