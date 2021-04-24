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
    public function subjectShowAll()
    {
        $this->withoutExceptionHandling();

        $Subject1 = $this->create('Subject');
        $Subject2 = $this->create('Subject');
        $Subject3 = $this->create('Subject');

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('GET', '/api/subjects');

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'name', 'subjectid'
                ]
            ],
            'links' => ['first', 'last', 'prev', 'next'],
            'meta' => ['current_page', 'last_page', 'from', 'to', 'path', 'per_page', 'total']
        ]);

        Log::info($response->getContent());
    }


    /** @test */
    public function subjectCreate()
    {
        $this->withoutExceptionHandling();

        $faker = Factory::create();

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('POST', 'api/subjects', [
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
    public function fail404SubjectNotFound()
    {
        $response = $this->actingAs($this->create('User', [], false), 'api')->json('GET', "api/subjects/-1");

        $response->assertStatus(404);
    }

    /** @test */
    public function subjectShow()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('GET', "api/subjects/$subject->id");

        $response->assertStatus(200);

        $response->assertExactJson([
            'id' => $subject->id,
            'name' => $subject->name,
            'subjectid' => $subject->subjectid
        ]);


    }

    /** @test */
    public function fail404IfUpdatedSubjectNotFound()
    {

        //$this->withoutExceptionHandling();

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('PATCH', "api/subjects/-1");

        $response->assertStatus(404);


    }

    /** @test */
    public function subjectUpdate()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('PATCH', "api/subjects/$subject->id", [
            'name' => $subject->name . 'Updated',
            'subjectid' => $subject->subjectid . 0000
        ]);

        $response->assertStatus(200)->assertExactJson([
            'id' => $subject->id,
            'name' => $subject->name . 'Updated',
            'subjectid' => $subject->subjectid . 0000
        ]);

        $this->assertDatabaseHas('subjects', [
            'id' => $subject->id,
            'name' => $subject->name . 'Updated',
            'subjectid' => $subject->subjectid . 0000
        ]);
    }

    /** @test */
    public function fail404IfDeleteSubjectNotFound()
    {

        //$this->withoutExceptionHandling();

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('DELETE', "api/subjects/-1");

        $response->assertStatus(404);


    }

    /** @test */
    public function subjectDelete()
    {
        $this->withoutExceptionHandling();

        $subject = $this->create('Subject');

        $response = $this->actingAs($this->create('User', [], false), 'api')->json('DELETE', "api/subjects/$subject->id");

        $response->assertStatus(204)->assertSee(null);

        $this->assertDatabaseMissing('subjects', [
            'id' => $subject->id]);

    }

    /** @test */
    public function nonAuthenticatedUsersCannotAccessEndpoints()
    {
        $this->withoutExceptionHandling();

        $create = $this->json('POST', 'api/subjects');
        $create->assertStatus(401);

        $view = $this->json('GET', 'api/subjects/-1');
        $view->assertStatus(401);

        $update = $this->json('PATCH', 'api/subjects/-1');
        $update->assertStatus(401);

        $delete = $this->json('DELETE', 'api/subjects/-1');
        $delete->assertStatus(401);
    }
}
