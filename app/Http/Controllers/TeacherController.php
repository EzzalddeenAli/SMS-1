<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Section;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.teacher');
    }

    public function sections()
    {
        $teacher = Teacher::with(['subjects', 'subjects.section', 'subjects.section.level'])->find(auth()->id());
        $index = 0;

        return view('dashboard.teacher.section-list', compact('teacher', 'index'));
    }

    public function section($subject_id)
    {
        $subject = Teacher::findOrFail(auth()->id())->subjects->where('id', $subject_id)->first()->load('section.students');
//        $subject = Teacher::findOrFail(auth()->id())->subject($subject_id)->first()->load('section.students');

        $index = 0;
        $vue_modals = true;

        return view('dashboard.teacher.section', compact('subject', 'index', 'vue_modals'));
    }

    public function assignments()
    {
        $sections = Section::with(['subjects.assignments' => function ($query) {
            $query->where('teacher_id', auth()->id());
        }])->get();

        return view('dashboard.teacher.assignments', compact('sections'));
//        abort_unless(Gate::allows('assignments.view', $ass), 403);


    }

}
