<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'studentid' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'year' => 'required',
    ]);

        Student::create($data);
    }
}
