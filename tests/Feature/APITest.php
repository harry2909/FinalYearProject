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
            'name' => $name = $faker->catchPhrase,
            'subjectid' => $id = $faker->randomNumber()
        ]);

        \Log::info(1, [$response->getContent()]);

        $response->assertJsonStructure([
            'name', 'subjectid'
        ])->assertJson([
            'name' => $name,
            'subjectid' => $id
        ])->assertStatus(201);

        $this->assertDatabaseHas('subjects', [
            'name' => $name,
            'subjectid' => $id
        ]);

    }

    /** @test */
    public function productShow()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');



    }
}
