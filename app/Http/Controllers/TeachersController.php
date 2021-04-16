<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function store()
    {

        $teacher = Teacher::create($this->validateRequest());

        return redirect($teacher->teacherPath());

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
