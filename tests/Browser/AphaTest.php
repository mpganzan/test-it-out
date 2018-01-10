<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Data;

class AlphaTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAlphaDisplay()
    {
        $this->browse(function ($browser) {
            $browser->visit('/alpha')
                    ->assertSee('Alpha')
                    ->assertDontSee('Beta');
        });
    }

    public function testClickNextButton()
    {
        $this->browse(function ($browser){
            $browser->visit('/alpha')
                    ->press('Next')
                    ->assertPathIs('/beta');
        });
    }

    
}
