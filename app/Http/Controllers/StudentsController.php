<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::all()->toQuery()->paginate(15);
        return \view('studentsIndex')->with('students', $students);
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

    public function view(int $id)
    {
        $student = Student::find($id);
        return \view('studentView')->with('student', $student);
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
