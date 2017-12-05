<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Subject;
use Illuminate\Http\Request;

class ResourceAssignmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher')->only('store');
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

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'bail|required|string',
            'description'   => 'bail|required|string',
            'deadline_date' => 'bail|required|date_format:"Y-m-d"',
            'deadline_time' => 'bail|required|date_format:"H:i"',
            'subject_id'    => 'bail|required|numeric',
        ]);

        //determine if user is the subject teacher
        $subject = Subject::findOrFail($request->subject_id)->first();
        if (auth()->id() !== $subject->teacher_id) {
            return abort(403, '403 Unauthorized action.');
        }

        //@todo combine deadline_date & time. use auth()->id() for teacher_id
        $ass = Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline_date.' '.$request->deadline_time.':00',
            'subject_id' => $request->subject_id,
            'teacher_id' => auth()->id(),
        ]);

        return back()->with("status", "Successfully added assignment to subject  {$ass->subject->name}");
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        //
    }
}
