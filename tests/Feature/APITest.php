<?php

namespace Tests\Feature;

use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APITest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function productCreate()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST', 'api/subjects', [
            'name' => 'Example subject Name',
            'subjectid' => '1872'
        ]);


        $response->assertStatus(201);
        $this->assertCount(1, Subject::all());

    }
}
