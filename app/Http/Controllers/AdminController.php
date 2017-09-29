<?php

namespace App\Http\Controllers;

use App\Level;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.admin');
    }

    public function teachers()
    {
        if (request()->ajax()) {
            return Level::with(['sections', 'sections.subjects', 'department'])->get();
        }

        $teachers = Teacher::all();
        $index = 0;
        $vue_modals = true;

        return view('dashboard.admin.teacher-list', compact('teachers', 'index', 'vue_modals'));
    }

}
