<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function store()
    {

        $student = Student::create($this->validateRequest());

        return redirect($student->path());

    }

    public function update(Student $student)
    {

        $student->update($this->validateRequest());

        return redirect($student->path());

    }

    public function delete(Student $student)
    {
        $student->delete();

        return redirect('/students');
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
