<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Data;

class BetaTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBetaDisplay()
    {
        $this->browse(function ($browser) {
            $browser->visit('/beta')
                    ->assertSee('Beta')
                    ->assertDontSee('Alpha');
        });
    }

    public function testClickPreviousButton()
    {
        $this->browse(function ($browser){
            $browser->visit('/beta')
                    ->press('Previous')
                    ->assertPathIs('/alpha');
        });
    }

    
}
