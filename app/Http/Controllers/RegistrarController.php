<?php

namespace App\Http\Controllers;

use App\Level;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.registrar');
    }

/*    public function teachers()
    {
        $teachers = Teacher::all();
        $index = 0;
        $vue_modals = true;

        return view('dashboard.registrar.teacher-list', compact('teachers', 'index', 'vue_modals'));
    }*/

    public function students()
    {
        $students = Student::all();
        $index = 0;
        $vue_modals = true;

        return view('dashboard.registrar.student-list', compact('students', 'index', 'vue_modals'));
    }

    public function levels()
    {
        $levels = Level::all()->load('sections');

        if (request()->ajax()) {
            return $levels;
        }

        $index = 0;
        $vue_modals = true;

        return view('dashboard.registrar.level-list', compact('levels', 'index', 'vue_modals'));
    }

}
