<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$studentID = '/students/{student}';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', '\App\Http\Controllers\StudentsController@index');

Route::post('/students', '\App\Http\Controllers\StudentsController@store');

Route::get($studentID, '\App\Http\Controllers\StudentsController@view');

Route::patch($studentID, '\App\Http\Controllers\StudentsController@update');

Route::delete($studentID, '\App\Http\Controllers\StudentsController@delete');

Route::post('/teachers', '\App\Http\Controllers\TeachersController@store');
