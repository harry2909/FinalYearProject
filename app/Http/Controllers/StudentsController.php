<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::paginate(15);

        return \view('studentsIndex')->with('students', $students);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $student = new Student;
        $student->studentid = $request->get('studentID');
        $student->name = $request->get('studentName');
        $student->address = $request->get('studentAddress');
        $student->telephone = $request->get('studentTelephone');
        $student->year = $request->get('studentYear');
        $student->save();

        return Redirect::to('students');

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
            'studentName' => 'required',
            'studentID' => 'required',
            'studentAddress' => 'required',
            'studentTelephone' => 'required',
            'studentYear' => 'required',
        ]);
    }
}
