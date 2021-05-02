<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentsController extends Controller
{
    /**
     * @return Application|Factory|View
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
        $this->validateRequest();
        $student = new Student;
        $student->studentid = $request->get('studentID');
        $student->name = $request->get('studentName');
        $student->address = $request->get('studentAddress');
        $student->telephone = $request->get('studentTelephone');
        $student->year = $request->get('studentYear');
        $student->save();

        return Redirect::to('students');

    }

    public function update(Request $request, int $id)
    {

        $this->validateRequest();
        $student = Student::find($id);
        $student->studentid = $request->get('studentID');
        $student->name = $request->get('studentName');
        $student->address = $request->get('studentAddress');
        $student->telephone = $request->get('studentTelephone');
        $student->year = $request->get('studentYear');
        $student->update();

        return Redirect::to('/students/' . $id)->with('student', $student);

    }

    public function view(int $id)
    {
        $student = Student::find($id);
        return \view('studentView')->with('student', $student);
    }

    public function delete(int $id)
    {
        $student = Student::find($id);
        $student->delete();
        return Redirect::to('students')->with('deleteMessage', 'open');
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
