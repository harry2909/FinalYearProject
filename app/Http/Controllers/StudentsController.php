<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
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
        $subjectData = Subject::all();
        return \view('students.studentsIndex')->with('students', $students)->with('subjects', $subjectData);
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
        if($request->get('subjectID')!=null){
            $student->subject_id = $request->get('subjectID');
        }
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
        $subject = '';
        if($request->get('subjectID')!=null){
            $subject = Subject::where('subjectid', $request->get('subjectID'));
            $student->subject_id = $request->get('subjectID');
        }
        $student->update();

        return Redirect::to('/students/' . $id)->with('student', $student)->with('subject', $subject);

    }

    public function view(int $id)
    {
        $student = Student::find($id);
        $subjectData = Subject::all();
        return \view('students.studentView')->with('student', $student)->with('subject', $subjectData);
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
