<?php

namespace Tests\Feature;

use App\Models\Subject;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
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

        Log::info(1, [$response->getContent()]);

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
    public function fail404ProductNotFound()
    {
        $response = $this->json('GET', "api/products/-1");

        $response->assertStatus(404);
    }

    /** @test */
    public function productShow()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');

        $response = $this->json('GET', "api/subjects/$subject->id");

        $response->assertStatus(200);

        $response->assertExactJson([
            'id' => $subject->id,
            'name' => $subject->name,
            'subjectid' => $subject->subjectid
        ]);


    }

    /** @test */
    public function fail404IfUpdatedProductNotFound()
    {

        //$this->withoutExceptionHandling();

        $response = $this->json('PATCH', "api/subjects/-1");

        $response->assertStatus(404);


    }

    /** @test */
    public function productUpdate()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');

        $response = $this->json('PATCH', "api/subjects/$subject->id", [
            'name' => $subject->name . 'Updated',
            'subjectid' => $subject->subjectid . 0000
        ]);

        $response->assertStatus(200)->assertExactJson([
            'id' => $subject->id,
            'name' => $subject->name . 'Updated',
            'subjectid' => $subject->subjectid  . 0000
        ]);
    }
}
