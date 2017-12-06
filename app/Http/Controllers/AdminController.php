<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Image;
use App\Level;
use App\Registrar;
use App\Student;
use App\Teacher;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
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

        //quotes
/*        $http = new Client;
        try {
            $response = $http->get('https://favqs.com/api/qotd');
            if ($response->getStatusCode() === 200) {
                $response_array = json_decode((string) $response->getBody(), true);
                $quote['author'] = $response_array['quote']['author'];
                $quote['body'] = $response_array['quote']['body'];
            }
        } catch (ConnectException $e) {
            return view('dashboard.admin');
        }*/
        $count['students'] = Student::all()->count();
        $count['teachers'] = Teacher::all()->count();
        return view('dashboard.admin', compact('quote', 'count'));
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

    public function students()
    {
        $students = Student::all();
        $index = 0;
        $vue_modals = true;

        return view('dashboard.admin.student-list', compact('students', 'index', 'vue_modals'));
    }

    //change report card publish status
    public function publish(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);

        $admin = Admin::first();
        $admin->card_publish = $request->status;
        $admin->save();

        if ($request->status == 1) {
            $status = 'Grades Published';
        } else {
            $status = 'Grades Unpublished';
        }
        return back()->with('status', $status);
    }

    public function layout(Request $request, $area)
    {
        switch ($area) {
            case 'slideshow':
                $images = Image::where('type', 'slideshow')->orderBy('position', 'asc')->get();
                break;
            case 'tracks':
                $images = Image::where('type', 'tracks')->orderBy('position', 'asc')->get();
                break;
            case 'whyJil':
                $images = Image::where('type', 'whyJil')->orderBy('position', 'asc')->get();
                break;
            case 'about':
                $images = null;
                break;
            default:
                $images = null;
        }

        return view('dashboard.admin.layout', compact('images'));
    }

}
