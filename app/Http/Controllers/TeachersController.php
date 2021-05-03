<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeachersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $teachers = Teacher::paginate(15);

        return \view('teachers.teachersIndex')->with('teachers', $teachers);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
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

        return Redirect::to('/teachers/' . $id)->with('teacher', $teacher)->with('teacherUpdatedMessage', 'open');

    }

    public function view(int $id)
    {
        $teacher = Teacher::find($id);
        return \view('teachers.teacherView')->with('teacher', $teacher);
    }

    public function delete(int $id)
    {
        $teacher = teacher::find($id);
        $teacher->delete();
        return Redirect::to('teachers')->with('teacherDeletedMessage', 'open');
    }

    /**
     * @return array
     */
    public function validateRequest(): array
    {
        return request()->validate([
            'teacherName' => 'required',
            'teacherID' => 'required',
            'teacherSubject' => 'required',
        ]);
    }
}
