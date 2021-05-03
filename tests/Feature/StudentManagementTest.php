<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function showAllStudents()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/students');

        $response->assertStatus(200);
    }

    /** @test */
    public function addStudentToDB()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/students', [
            'studentName' => 'Test',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $this->assertCount(1, Student::all());
        $response->assertRedirect();
    }

    /** @test */
    public function testStudentNameValidation()
    {
        $response = $this->post('/students', [
            'studentName' => '',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $response->assertSessionHasErrors('studentName');
    }

    /** @test */
    public function testStudentIDValidation()
    {
        $response = $this->post('/students', [
            'studentName' => 'Test',
            'studentID' => '',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $response->assertSessionHasErrors('studentID');
    }

    /** @test */
    public function removeStudentFromDB()
    {
        $this->withoutExceptionHandling();

        $this->post('/students', [
            'studentName' => 'Test',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $student = Student::first();
        $this->assertCount(1, Student::all());

        $response = $this->delete($student->path());

        $this->assertCount(0, Student::all());
        $response->assertRedirect('/students');
    }

    /** @test */
    public function updateStudent()
    {
        $this->withoutExceptionHandling();

        $this->post('/students', [
            'studentName' => 'Test',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $student = Student::first();

        $response = $this->patch('/students/' . $student->id, [
            'studentName' => 'New name',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $this->assertEquals('New name', Student::first()->name);
        $response->assertRedirect($student->path());
    }

    /** @test */
    public function showStudentTest()
    {
        $this->withoutExceptionHandling();

        $this->post('/students', [
            'studentName' => 'Test',
            'studentID' => '123',
            'studentAddress' => '5 long lane',
            'studentTelephone' => '75625845240',
            'studentYear' => '8'
        ]);

        $student = Student::first();

        $response = $this->get($student->path());

        $this->assertCount(1, Student::all());
        $response->assertStatus(200);
    }
}
