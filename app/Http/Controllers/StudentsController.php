<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {
        Student::create([
            'name' => request('name'),
            'id' => request('id'),
            'address' => request('address'),
            'telephone' => request('telephone'),
            'year' => request('year')
        ]);
    }
}
