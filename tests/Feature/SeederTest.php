<?php

namespace Tests\Feature;

use App\Models\Student;
use Database\Seeders\StudentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function SeederWorks(){

        $this->withoutExceptionHandling();

        Artisan::call('db:seed StudentSeeder');

        $this->assertCount(50, Student::all());

    }

}
