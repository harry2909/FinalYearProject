<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {

        Student::create($this->validateRequest());
    }

    public function update(Student $student)
    {

        $student->update($this->validateRequest());

    }

    /**
     * @return array
     */
    public function validateRequest(): array
    {
        return request()->validate([
            'name' => 'required',
            'studentid' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'year' => 'required',
        ]);
    }
}
