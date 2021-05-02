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

Route::get('/token', function () {
    return csrf_token();
});

Route::post('/auth/token', '\App\Http\Controllers\AuthController@store')->name('getToken');

$studentID = '/students/{id}';

Route::get('/students', '\App\Http\Controllers\StudentsController@index')->name('showStudents');

Route::post('/students', '\App\Http\Controllers\StudentsController@store')->name('storeStudents');

Route::get($studentID, '\App\Http\Controllers\StudentsController@view')->name('showSelectedStudent');

Route::patch($studentID, '\App\Http\Controllers\StudentsController@update')->name('updateSelectedStudent');

Route::delete($studentID, '\App\Http\Controllers\StudentsController@delete')->name('deleteSelectedStudent');


$teacherID = '/teachers/{teacher}';

Route::post('/teachers', '\App\Http\Controllers\TeachersController@store')->name('showTeachers');

Route::get('/teachers', '\App\Http\Controllers\TeachersController@index')->name('storeTeachers');

Route::get($teacherID, '\App\Http\Controllers\TeachersController@view')->name('showSelectedTeacher');

Route::patch($teacherID, '\App\Http\Controllers\TeachersController@update')->name('updateSelectedTeacher');

Route::delete($teacherID, '\App\Http\Controllers\TeachersController@delete')->name('deleteSelectedTeacher');




