<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
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

}
