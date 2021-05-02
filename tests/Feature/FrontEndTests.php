<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontEndTests extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function addStudentView()
    {
        $response = $this->post('/students', [
            'name' => 'Example Student Name',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);
        $response->assertRedirect();
    }

}
