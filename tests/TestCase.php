<?php

namespace Tests;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Subject;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use HasFactory;

    public function create(string $model, array $attributes = [], $resource = true)
    {
        if($model == 'Subject'){
            $resourceModel = Subject::factory("App\\$model")->create($attributes);
        } elseif ($model == 'User'){
            $resourceModel = User::factory("App\\$model")->create($attributes);
        }
        $resourceClass = "App\\Http\\Resources\\$model";

        if(!$resource){
            return $resourceModel;
        }

        return new $resourceClass($resourceModel);

    }
}
