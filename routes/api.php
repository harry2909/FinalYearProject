<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$studentID = '/students/{student}';

Route::get('/students', '\App\Http\Controllers\StudentsController@index');

Route::post('/students', '\App\Http\Controllers\StudentsController@store');

Route::get($studentID, '\App\Http\Controllers\StudentsController@view');

Route::patch($studentID, '\App\Http\Controllers\StudentsController@update');

Route::delete($studentID, '\App\Http\Controllers\StudentsController@delete');

$teacherID = '/teachers/{teacher}';

Route::post('/teachers', '\App\Http\Controllers\TeachersController@store');

Route::get('/teachers', '\App\Http\Controllers\TeachersController@index');

Route::get($teacherID, '\App\Http\Controllers\TeachersController@view');

Route::patch($teacherID, '\App\Http\Controllers\TeachersController@update');

Route::delete($teacherID, '\App\Http\Controllers\TeachersController@delete');

