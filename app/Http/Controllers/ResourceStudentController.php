<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\storeStudent;
use App\Http\Requests\updateStudent;
use App\Section;
use ErrorException;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class ResourceStudentController extends Controller
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
        //Showing forms are done with Vue
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeStudent|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeStudent $request)
    {

        $student = Student::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'section_id' => $request->section_id,
        ]);

        //find section's subjects then foreach grade add student
        $section = Section::find($request->section_id);

        foreach ($section->subjects as $subject) {
            Grade::create([
                'subject_id' => $subject->id,
                'student_id' => $student->id,
            ]);
        }

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
     * @param $username
     * @return Student
     * @internal param int $id
     */
    public function edit($username)
    {
        if(request()->ajax()) {
            return Student::where('username', $username)->first();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param updateStudent|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(updateStudent $request)
    {
        $student = Student::find($request->id);

        $request->password === null ? $password = $student->password : $password = Hash::make($request->password);

        $student->update([
        'username' => $request->username,
        'password' => $password,
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'advisory' => $request->advisory,
//        'section_id' => $request->section_id,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($username)
    {
        $student = Student::where('username', $username)->first();

        Grade::where('student_id', $student->id)->delete();

        $student->delete();

        return back();
    }
}
