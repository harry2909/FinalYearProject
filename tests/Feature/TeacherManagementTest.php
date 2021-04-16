<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createTeacher(){
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'name' => 'Example teacher name',
            'teacherid' => '5489',
            'subject' => 'Example teacher subject'
        ]);

        $this->assertCount(1, Teacher::all());
    }
}
