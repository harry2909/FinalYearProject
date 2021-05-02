<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function SeederWorks(){

        $this->withoutExceptionHandling();

        Artisan::call('db:seed StudentSeeder');
        Artisan::call('db:seed TeacherSeeder');

        $this->assertCount(50, Student::all());
        $this->assertCount(50, Teacher::all());

    }

}
