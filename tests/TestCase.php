<?php

namespace Tests;

use Database\Factories\SubjectFactory;
use Database\Seeders\StudentSeeder;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Http\Resources\Subject as SubjectResource;
use App\Models\Subject;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use HasFactory;

    public function create(string $model, array $attributes = [])
    {
        $subject = Subject::factory("App\\$model")->create($attributes);

        return new SubjectResource($subject);

    }
}
