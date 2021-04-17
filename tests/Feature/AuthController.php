<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthController extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canAuthenticate()
    {
        //$this->withoutExceptionHandling();

        $response = $this->json('POST', 'auth/token', [
            'email' => $this->create('User', [], false)->email,
            'password' => 'secret'
        ]);

        //dd(User::all());
        dd($response);

        $response->assertStatus(200)->assertJsonStructure(['token']);
    }
}
