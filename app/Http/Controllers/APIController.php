<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Resources\Subject as SubjectResource;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function show(int $id)
    {
        $subject = Subject::findOrFail($id);

        return response()->json(new SubjectResource($subject));
    }

    public function store(Request $request)
    {
        $subject = Subject::create($request->all());

        return response()->json(new SubjectResource($subject), 201);
    }

    public function update(Request $request, int $id)
    {
        $subject = Subject::findOrFail($id);

        $subject->update($request->all());

        return response()->json(new SubjectResource($subject), 200);
    }

    public function delete(Subject $subject)
    {
        $subject->delete();

        return response()->json(null, 204);
    }
}
