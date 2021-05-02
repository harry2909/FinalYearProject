<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createTeacher(){
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'teacherName' => 'Example teacher name',
            'teacherID' => '5489',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $this->assertCount(1, Teacher::all());
    }

    /** @test */
    public function testTeacherNameValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/teachers', [
            'teacherName' => '',
            'teacherID' => '5489',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $response->assertSessionHasErrors('teacherName');


    }

    /** @test */
    public function testTeacherIDValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/teachers', [
            'teacherName' => 'Example teacher name',
            'teacherID' => '',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $response->assertSessionHasErrors('teacherID');


    }

    /** @test */
    public function removeTeacherFromDB()
    {
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'teacherName' => 'Example teacher name',
            'teacherID' => '12',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $teacher = Teacher::first();
        $this->assertCount(1, Teacher::all());

        $response = $this->delete($teacher->teacherPath());

        $this->assertCount(0, Teacher::all());
        $response->assertRedirect('/teachers');
    }

    /** @test */
    public function updateTeacher()
    {

        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'teacherName' => 'Example teacher name',
            'teacherID' => '5489',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $teacher = Teacher::first();

        $response = $this->patch('/teachers/' . $teacher->id, [
            'teacherName' => 'New teacher name',
            'teacherID' => '5489',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $this->assertEquals('New teacher name', Teacher::first()->name);
        $response->assertRedirect($teacher->teacherPath());

    }

    /** @test */
    public function showTeacherTest()
    {
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'teacherName' => 'Example teacher name',
            'teacherID' => '5489',
            'teacherSubject' => 'Example teacher subject'
        ]);

        $teacher = Teacher::first();

        $response = $this->get($teacher->teacherPath());

        $this->assertCount(1, Teacher::all());
        $response->assertStatus(200);

    }
}
