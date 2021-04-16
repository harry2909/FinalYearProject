<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {

        $data = $this->validateRequest();

        Student::create($data);
    }

//    public function destroy($id)
//    {
//        $data = Student::find($id);
//        $data->delete();
//    }

    public function update(Student $student){

        $data = $this->validateRequest();

        $student->update($data);


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
