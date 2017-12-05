<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Http\Requests\storeAssignment;
use App\Http\Requests\updateAssignment;
use App\Subject;
use Illuminate\Http\Request;

class ResourceAssignmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher')->only(['store', 'update']);
    }

    public function index()
    {
        if (request()->ajax()) {
            return Assignment::all();
        }

    }

    public function create()
    {
        //
    }

    public function store(storeAssignment $request)
    {
        //determine if user is the subject teacher
        $subject = Subject::findOrFail($request->subject_id)->first();
        if (auth()->id() !== $subject->teacher_id) {
            return abort(403, '403 Unauthorized action.');
        }

        //@todo combine deadline_date & time. use auth()->id() for teacher_id
        $ass = Assignment::create([
            'title'       => $request->title,
            'description' => $request->description,
            'deadline'    => $request->deadline_date . ' ' . $request->deadline_time . ':00',
            'subject_id'  => $request->subject_id,
            'teacher_id'  => auth()->id(),
        ]);

        return back()->with("status", "Successfully added assignment to subject  {$ass->subject->name}");
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        if (request()->ajax()) {
            return $assignment;
        }
    }

    public function update(updateAssignment $request)
    {
        $ass = Assignment::where('id', $request->id)
            ->where('title', $request->title)
            ->where('teacher_id', auth()->id())
            ->firstOrFail();

        $deadline = ($request->deadline_date !== null) ? $request->deadline_date . ' ' . $request->deadline_time . ':00' : $ass->deadline;
        $ass->update([
            'title'       => $request->title,
            'description' => $request->description,
            'deadline'    => $deadline,
        ]);

        return back()->with("status", "Successfully updated assignment");
    }

    public function destroy(Assignment $assignment)
    {
        $ass = $assignment->title;
        $assignment->delete();

        return back()->with("status", "Successfully deleted assignment $ass");
    }
}
