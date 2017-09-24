<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTeacher;
use App\Http\Requests\updateStudent;
use App\Http\Requests\updateTeacher;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTeacher $request)
    {
        Teacher::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'advisory' => $request->advisory,
        ]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        'section_id' => $request->section_id,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        Teacher::where('username', $username)->delete();

        return back();
    }
}
