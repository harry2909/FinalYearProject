<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthController extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install --force');
    }

    /** @test */
    public function canAuthenticate()
    {
        $this->withoutExceptionHandling();

        $user = $this->create('User', [], false);

        $response = $this->json('POST', 'auth/token', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(200)->assertJsonStructure(['token']);
    }

    /** @test */
    public function canLogin()
    {
        $this->withoutExceptionHandling();

        $user = $this->create('User', [], false);

        $response = $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(200)->assertJsonStructure(['email', 'token']);
    }

    /** @test */
    public function canRegister()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST', 'api/register', [
            'name' => 'harry2909',
            'email' => 'harry2909@gmail.com',
            'password' => 'secret'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'name', 'token'
        ]);


    }

}
