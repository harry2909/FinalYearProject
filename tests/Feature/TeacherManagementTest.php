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

        $this->post('/teacher', [
            'name' => 'Example teacher name',
            'teacherid' => 'Example teacher ID',
            'subject' => 'Example teacher subject'
        ]);

        $this->assertCount(1, Teacher::all());
    }
}
