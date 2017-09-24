<?php

namespace App\Http\Controllers;

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

}
