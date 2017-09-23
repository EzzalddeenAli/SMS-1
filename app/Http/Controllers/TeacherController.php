<?php

namespace App\Http\Controllers;

use App\Section;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

/*    public function section(Section $id)
    {
        $section_id = $id->id;
        $students =  $id->students;
        $index = 0;
        $vue_modals = true;

        return view('dashboard.teacher.section', compact('students', 'index', 'section_id', 'vue_modals'));
    }*/

    public function section($subject_id)
    {
        $subject = Teacher::find(auth()->id())->subjects->where('id', $subject_id)->first()->load('section.students');

        $index = 0;
        $vue_modals = true;

        return view('dashboard.teacher.section', compact('subject', 'index', 'vue_modals'));
    }

}
