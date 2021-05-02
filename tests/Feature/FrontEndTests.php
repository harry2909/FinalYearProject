<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontEndTests extends TestCase
{
    /** @test */
    public function getWelcomeView()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');
    }

    /** @test */
    public function getIndexViewStudents()
    {
        $response = $this->get('/students');

        $response->assertViewIs('studentsIndex');
    }
    
}
