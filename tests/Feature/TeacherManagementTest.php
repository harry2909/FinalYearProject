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

    /** @test */
    public function testTeacherNameValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/teachers', [
            'name' => '',
            'teacherid' => '1872',
            'subject' => 'Example teacher subject'
        ]);

        $response->assertSessionHasErrors('name');


    }

    /** @test */
    public function testTeacherIDValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/teachers', [
            'name' => 'Example teacher name',
            'teacherid' => '',
            'subject' => 'Example teacher subject'
        ]);

        $response->assertSessionHasErrors('teacherid');


    }

    /** @test */
    public function removeTeacherFromDB()
    {
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'name' => 'Example teacher Name',
            'teacherid' => '18724',
            'subject' => 'Example teacher subject'
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
            'name' => 'Example teacher Name',
            'teacherid' => '1872',
            'subject' => 'Example teacher subject'
        ]);

        $teacher = Teacher::first();

        $response = $this->patch($teacher->teacherPath(), [
            'name' => 'New teacher name',
            'teacherid' => '1872',
            'subject' => 'Example teacher subject'
        ]);

        $this->assertEquals('New teacher name', Teacher::first()->name);
        $response->assertRedirect($teacher->teacherPath());

    }

    /** @test */
    public function showTeacherTest()
    {
        $this->withoutExceptionHandling();

        $this->post('/teachers', [
            'name' => 'Example teacher Name',
            'teacherid' => '1872',
            'subject' => 'Example teacher subject'
        ]);

        $teacher = Teacher::first();

        $response = $this->get($teacher->teacherPath());

        $this->assertCount(1, Teacher::all());
        $response->assertRedirect($teacher->teacherPath());

    }
}
