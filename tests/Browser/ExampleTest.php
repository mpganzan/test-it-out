<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Data;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $val = 'Email';
        $this->browse(function ($browser) {
            $val = 'Name';
            $browser->visit('/')
                    ->assertSee($val)
                    ->assertDontSee('Middle');
        });
    }
    
    public function testPutDataToDbUser()
    {

        $user = factory(User::class)->create([
            'name' => 'Mon'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('You are logged in!')
                    ->visit('/home')
                    ->clickLink($user->name)
                    ->visit($browser->attribute('#logout', 'href'))
                    ->assertSee('Laravel');
        });
    }

    public function testPutDataToDb()
    {

        $user = factory(Data::class)->create([
            'fname' => 'Patrick'
        ]);

        $this->assertDatabaseHas('datas', [
            'fname' => 'Patrick'
        ]);

    }

    
}
