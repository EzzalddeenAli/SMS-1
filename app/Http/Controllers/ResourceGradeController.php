<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Section;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResourceGradeController extends Controller
{
    public function __construct()
    {
        return "GRADE CONTROLLER!";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $subject_id
     * @param $username
     * @return Grade
     */

    public function edit($subject_id, $username)
    {
        if(request()->ajax()) {
            $student_id = Student::where('username', $username)->first();
            return Grade::gradeOf($subject_id, $student_id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function update(Request $request)
    {
        $request->validate([
            '1st' => 'bail|integer|nullable|between:60,100',
            '2nd' => 'bail|integer|nullable|between:60,100',
            '3rd' => 'bail|integer|nullable|between:60,100',
            '4th' => 'bail|integer|nullable|between:60,100',
            'subject_id' => 'bail|required|integer',
            'student_id' => 'bail|required|integer',
        ]);

        $subject = Subject::find($request->subject_id);

        if (Gate::allows('update-grade', $subject)) {
            Grade::where('subject_id', $request->subject_id)->where('student_id', $request->student_id)->update([
                '1st' => $request->{'1st'},
                '2nd' => $request->{'2nd'},
                '3rd' => $request->{'3rd'},
                '4th' => $request->{'4th'},
            ]);

            return back();
        }

        if (Gate::denies('update-grade', $subject)) {
            return back()->withErrors(['warning' => 'You don\'t have permission to edit this grade!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
