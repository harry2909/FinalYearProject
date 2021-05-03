<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function view;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(15);

        return view('teachers.teachersIndex')->with('teachers', $teachers);
    }

    public function store(Request $request)
    {
        $this->validateRequest();
        $teacher = new Teacher;
        $teacher->teacherid = $request->get('teacherID');
        $teacher->name = $request->get('teacherName');
        $teacher->subject = $request->get('teacherSubject');
        $teacher->save();

        return Redirect::to('teachers')->with('teacherCreateMessage', 'open');
    }

    public function update(Request $request, int $id)
    {
        $this->validateRequest();
        $teacher = Teacher::find($id);
        $teacher->teacherid = $request->get('teacherID');
        $teacher->name = $request->get('teacherName');
        $teacher->subject = $request->get('teacherSubject');
        $teacher->update();

        return Redirect::to('/teachers/' . $id)->with('teacher', $teacher)
            ->with('teacherUpdatedMessage', 'open');
    }

    public function view(int $id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.teacherView')->with('teacher', $teacher);
    }

    public function delete(int $id)
    {
        $teacher = teacher::find($id);
        $teacher->delete();
        return Redirect::to('teachers')->with('teacherDeletedMessage', 'open');
    }

    public function validateRequest(): array
    {
        return request()->validate([
            'teacherName' => 'required',
            'teacherID' => 'required',
            'teacherSubject' => 'required',
        ]);
    }
}
