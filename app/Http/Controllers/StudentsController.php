<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {

        $data = request->validate([
            'title' => 'required'
    ]);

        Student::create($data);
    }
}
