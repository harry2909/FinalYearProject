<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return Teacher::all();
    }

    public function store()
    {

        $teacher = Teacher::create($this->validateRequest());

        return redirect($teacher->teacherPath());

    }

    public function update(Teacher $teacher)
    {

        $teacher->update($this->validateRequest());

        return redirect($teacher->teacherPath());

    }

    public function view(Teacher $teacher)
    {
        return redirect($teacher->teacherPath());
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();

        return redirect('/teachers');
    }

    /**
     * @return array
     */
    public function validateRequest(): array
    {
        return request()->validate([
            'name' => 'required',
            'teacherid' => 'required',
            'subject' => 'required'
        ]);
    }
}
