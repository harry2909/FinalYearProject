<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function show(Subject $subject)
    {
        return $subject;
    }

    public function store(Request $request)
    {
        $subject = Subject::create($request->all());

        return response()->json($subject, 201);
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());

        return response()->json($subject, 200);
    }

    public function delete(Subject $subject)
    {
        $subject->delete();

        return response()->json(null, 204);
    }
}
