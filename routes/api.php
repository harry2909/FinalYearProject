<?php

use App\Models\Student;
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

$studentRoute = '/students/{id}';

Route::get('/students', function () {
    return Student::all();
});

Route::get($studentRoute, function ($id) {
    return Student::find($id);
});

Route::post('/students', function (Request $request) {
    return Student::create($request->all);
});

Route::patch($studentRoute, function (Request $request, $id) {
    $student = Student::findOrFail($id);
    $student->update($request->all());
});

Route::delete($studentRoute, function ($id) {
    Student::find($id)->delete();

    return 204;
});


