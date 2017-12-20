<?php

namespace App\Http\Controllers;

use App\SchoolInformation;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Rating;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $student = Student::with(['section', 'section.assignments', 'section.assignments.teacher'])->find(auth()->id());
        return view('dashboard.student', compact('student'));
    }

    public function school_info()
    {
        $school_info = SchoolInformation::firstOrFail();
        return view('dashboard.student.school-info', compact('school_info'));
    }

    public function grades() {
        $divisor = 0;
        $student = Student::with(['grades', 'grades.subject'])->find(auth()->id());
        // return $student;
        return view('dashboard.student.grades', compact('student', 'divisor'));
    }

    public function permit()
    {
        return view('dashboard.student.permit');
    }

    public function teachers()
    {
        $student = Student::with('section.subjects.teacher')->find(auth()->id());
        $vue_rating = true;
        return view('dashboard.student.rate', compact('student', 'vue_rating'));
    }

    public function rate(Request $request)
    {
        Rating::updateOrCreate(
            [
                'rateable_id' => $request->teacherId,
                'rateable_type' => 'App\Teacher',
                'student_id' => auth()->id(),
                'subject_id' => $request->subjectId
            ],

            ['rating' => $request->rating]
        );

        return $request;
    }

    public function calendar()
    {
//        return Carbon::createFromTimestamp('1512489600'); //convert milisecond to date

        return view('dashboard.student.calendar');
    }

}
