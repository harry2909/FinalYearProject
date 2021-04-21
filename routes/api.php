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

Route::post('login', '\App\Http\Controllers\AuthController@login')->name('loginRequest');

Route::post('register', '\App\Http\Controllers\AuthController@register')->name('registerRequest');

Route::get('/subjects', '\App\Http\Controllers\APIController@index')->name('showSubjects');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('user-details', '\App\Http\Controllers\AuthController@showDetails')->name('getUser');

    $subjectID = '/subjects/{subject}';

    Route::post('/subjects', '\App\Http\Controllers\APIController@store');

    Route::get($subjectID, '\App\Http\Controllers\APIController@show');

    Route::patch($subjectID, '\App\Http\Controllers\APIController@update');

    Route::delete($subjectID, '\App\Http\Controllers\APIController@delete');

});






