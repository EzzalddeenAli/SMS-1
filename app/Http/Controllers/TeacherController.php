<?php

namespace App\Http\Controllers;

use App\Section;
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
        $sections = Section::all();
        $index = 0;

        return view('dashboard.teacher.section-list', compact('sections', 'index'));
    }

    public function section(Section $id)
    {
        $section_id = $id->id;
        $students =  $id->students;
        $index = 0;
        $vue_modals = true;

        return view('dashboard.teacher.section', compact('students', 'index', 'section_id', 'vue_modals'));
    }

}
