<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function SeederWorks(){

        $this->withoutExceptionHandling();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            Student::create([
                'name' => $faker->name,
                'studentid' => $faker->randomNumber(),
                'address' => $faker->address,
                'telephone' => $faker->randomNumber(),
                'year' => $faker->randomDigit
            ]);
        }

        $this->assertCount(50, Student::all());



    }

}
