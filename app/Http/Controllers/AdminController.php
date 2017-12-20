<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Image;
use App\Level;
use App\Registrar;
use App\SchoolInformation;
use App\Section;
use App\Student;
use App\Teacher;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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

    public function school_info()
    {
        if (request()->has('preview')) {
            $preview = "true";
        }
        $school_info = SchoolInformation::firstOrFail();
        return view('dashboard.admin.school-info', compact('school_info', 'preview'));
    }

    public function levels()
    {
        $levels = Level::all()->load('sections');
        return view('dashboard.admin.level-list', compact('levels'));
    }

    public function section(Section $id)
    {
        $subjects = $id->subjects->load('teacher');
        $index = 0;

        return view('dashboard.admin.section', compact('index', 'subjects'));
    }

    /*SEARCH FORM*/
    public function search()
    {
        $users = ['student', 'teacher'];
        $funcs = ['report_card', 'permit'];
        //Check user type
        if (in_array(request()->query('type_user'), $users)) {
            //Check function type
            if (in_array(request()->query('type_func'), $funcs)) {
                $user = request()->query('type_user');
                $func = request()->query('type_func');
                return view('dashboard.admin.find-user', compact('user', 'func'));
            }
        }

        abort(404, 'Undefined type');
    }

    /*ADVANCE SEARCH*/
    public function find(Request $request)
    {
        $request->validate([
            'user'        => 'required|string',
            'func'        => 'required|string',
            'username'    => 'bail|nullable|string',
            'first_name'  => 'bail|nullable|string',
            'middle_name' => 'bail|nullable|string',
            'last_name'   => 'bail|nullable|string',
            'age'         => 'bail|nullable|numeric',
            'section'     => 'bail|nullable|string',
        ]);

        //For PostgreSQL compatibility issue
        //If age is not null
        $age['sign'] = '=';
        $age['val'] = $request->age;
        //If age is null
        if ($request->age === null) {
            $age['sign'] = '>';
            $age['val'] = 0;
        }

        //fetch result based on given user type
        switch ($request->user) {
            case 'student':
                $results = Student::where('username', 'like', '%' . $request->username . '%')
                    ->where('first_name', 'like', '%' . $request->first_name . '%')
                    ->where('middle_name', 'like', '%' . $request->middle_name . '%')
                    ->where('last_name', 'like', '%' . $request->last_name . '%')
                    ->where('age', $age['sign'], $age['val'])
                    ->whereHas('section', function ($query) {
                        $query->where('name', 'like', '%' . request()->section . '%');
                    })
                    ->get()->load('section');

                if (count($results) > 0) {
                    $message = count($results) . ' Students were found.';
                } else {
                    $message = 'No Student Found.';
                }

                break;
            case 'teacher':

                break;
            default:
                abort(404, 'Type Error');
        }

        $func = $request->func;

        return view('dashboard.admin.find-results', compact('results', 'message', 'func'));
    }

    /*BASIC SEARCH*/
    public function find_basic(Request $request)
    {
        $request->validate([
            'user'         => 'required|string',
            'func'         => 'required|string',
            'basic_search' => 'bail|nullable|alpha_num_spaces',
        ]);

        //fetch result based on given user type
        if (is_numeric((int)$request->basic_search)) {
            $age = (int)$request->basic_search;
        } else {
            $age = 0;
        }
        $request->basic_search = '%' . $request->basic_search . '%';

        switch ($request->user) {
            case 'student':
                $results = Student::where('username', 'like', $request->basic_search)
                    ->orWhere('first_name', 'like', $request->basic_search)
                    ->orWhere('middle_name', 'like', $request->basic_search)
                    ->orWhere('last_name', 'like', $request->basic_search)
                    ->orWhere('age', $age)
                    ->orWhereHas('section', function ($query) {
                        $query->where('name', 'like', request()->basic_search);
                    })
                    ->get()->load('section');

                if (count($results) > 0) {
                    $message = count($results) . ' Students were found.';
                } else {
                    $message = 'No Student Found.';
                }

                break;
            case 'teacher':

                break;
            default:
                abort(404, 'Type Error');
        }

        $func = $request->func;

        return view('dashboard.admin.find-results', compact('results', 'message', 'func'));
    }

    public function report_card(Request $request)
    {
        $student = Student::where('username', $request->username)->firstOrFail();
        return view('dashboard.admin.student-report-card', compact('student'));
    }

    //@todo make permit
    public function permit(Request $request)
    {
        $student = Student::where('username', $request->username)->firstOrFail();
        return view('dashboard.admin.student-permit', compact('student'));
    }

    public function assignments(Section $section)
    {
        $section = $section->load(['assignments', 'assignments.teacher']);
        return view('dashboard.admin.section-assignments', compact('section'));
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

    public function ratings()
    {
        $teachers = Teacher::all()->load('ratings');
        return view('dashboard.admin.teacher-ratings', compact('teachers'));
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

    public function Calendar()
    {
        //        return Carbon::createFromTimestamp('1512489600'); //convert milisecond to date

        return view('dashboard.admin.calendar');
    }

}
