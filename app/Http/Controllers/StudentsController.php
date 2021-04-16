<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentsController extends Controller
{

    public function index()
    {
        return Student::all();
    }

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

    public function view(Student $student)
    {
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
