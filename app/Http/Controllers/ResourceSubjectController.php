<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class ResourceSubjectController extends Controller
{
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
        $request->validate([
            'teacherId' => 'bail|required|integer',
            'sectionId' => 'bail|required|integer',
            'subject-name' => 'bail|required|string',
        ]);

        Subject::create([
            'name' => $request->{'subject-name'},
//            'grade_id' => 1,
            'section_id' => $request->sectionId,
            'teacher_id' => $request->teacherId,
        ]);

        return back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        $request->validate([
            'teacherId' => 'bail|required|numeric',
            'subjects' => 'bail|required|array',
            'subjects.*' => 'numeric',
        ]);

        foreach ($request->subjects as $subject_id) {
            $subject = Subject::find($subject_id);

            $subject->update([
                'teacher_id' => $request->teacherId
            ]);
        }

        return back();
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
