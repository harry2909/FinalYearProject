<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DuskAPITest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSubjectsPage()
    {
        $this->withoutExceptionHandling();

        $this->browse(function (Browser $browser) {
            $text = '{"data":[],"links":{"first":"http:\/\/127.0.0.1:8000\/api\/subjects?page=1","last":"http:\/\/127.0.0.1:8000\/api\/subjects?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":null,"last_page":1,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/subjects?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}],"path":"http:\/\/127.0.0.1:8000\/api\/subjects","per_page":15,"to":null,"total":0}}';
            $browser->visit('http://127.0.0.1:8000/api/subjects')
                ->assertSee($text);
        });
    }

    /** @test */
    public function testUnauthorisedPage()
    {
        $this->withoutExceptionHandling();

        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/api/subjects/1')->assertSee('Unauthorised');
        });
    }

}
