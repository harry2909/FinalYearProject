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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', '\App\Http\Controllers\StudentsController@index');

Route::post('/students', '\App\Http\Controllers\StudentsController@store');

Route::get('/students/{student}', '\App\Http\Controllers\StudentsController@store');

Route::patch('/students/{student}', '\App\Http\Controllers\StudentsController@update');

Route::delete('/students/{student}', '\App\Http\Controllers\StudentsController@delete');
