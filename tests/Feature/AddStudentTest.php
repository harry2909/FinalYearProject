<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddStudentTest extends TestCase
{
    /** @test */
    public function addStudentToDB()
    {
        // to get underlying error
        $this->withoutExceptionHandling();

        $response = $this->post('/students' , [
            'name' => 'Example Student Name',
            'id' => 'Example student ID',
            'address' => 'Example student address',
            'telephone' => 'Example student telephone',
            'year' => 'Example student year'
        ]);

        $response->assertOk();
        $this->assertCount(1, Student::all());
    }
}
