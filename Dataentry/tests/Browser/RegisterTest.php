<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Register')         //click the Register Link
                    ->assertSee('Register')        //Check if Register keyword is present in body
                    ->value('#name', 'Joe Schmoe') //fill out the form element using jquery Id
                    ->value('#email', 'joe@example.com')
                    ->value('#password', '12345678')
                    ->value('#password-confirm', '12345678')
                    ->press('Register')
                    //->click('button[type="submit"]') // click the submit button using the jquery selector
                    ->assertPathIs('/home') //assert the we are on the homepage
                    ->assertSee('You are logged in!');//check the body contents to see the text
                    //->assertTitleContains(''); //check the title contain whaterer we set
                    

        });
    }
}
