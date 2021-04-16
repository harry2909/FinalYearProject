<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddStudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addStudentToDB()
    {
        // to get underlying error
        $this->withoutExceptionHandling();

        $response = $this->post('/students', [
            'name' => 'Example Student Name',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $response->assertOk();
        $this->assertCount(1, Student::all());
    }

    /** @test */
    public function testStudentNameValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/students', [
            'name' => '',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $response->assertSessionHasErrors('name');


    }

    /** @test */
    public function testStudentIDValidation()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/students', [
            'name' => 'Example student name',
            'studentid' => '',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $response->assertSessionHasErrors('studentid');


    }

    /** @test */
    public function removeStudentFromDB()
    {
        $this->withoutExceptionHandling();

        $this->post('/students', [
            'name' => 'Example Student Name',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $student = Student::first();

        $response = $this->delete('/students/' . $student->id);

        $this->assertCount(0, Student::all());
    }

    /** @test */
    public function updateStudent()
    {

        $this->withoutExceptionHandling();

        $this->post('/students', [
            'name' => 'Example Student Name',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $student = Student::first();

        $response = $this->patch('/students/' . $student->id, [
            'name' => 'New name',
            'studentid' => '1872',
            'address' => 'Example student address',
            'telephone' => '75625845240',
            'year' => '8'
        ]);

        $this->assertEquals('New name', Student::first()->name);

    }
}
