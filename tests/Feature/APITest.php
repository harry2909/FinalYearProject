<?php

namespace Tests\Feature;

use App\Models\Subject;
use Faker\Factory;
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

        $faker = Factory::create();

        $response = $this->json('POST', 'api/subjects', [
            'name' => $faker->catchPhrase,
            'subjectid' => $faker->randomNumber()
        ]);

        dd(Subject::first());


        $response->assertStatus(201);
        $this->assertCount(1, Subject::all());

    }
}
