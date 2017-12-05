<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTeacher;
use App\Http\Requests\updateTeacher;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class ResourceTeacherController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //Showing forms are done with Vue
    }

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

    public function show($id)
    {
        //
    }

    public function edit($username)
    {
        if(request()->ajax()) {
            return Teacher::where('username', $username)->first();
        }
    }

    public function update(updateTeacher $request)
    {
        $teacher = Teacher::find($request->id);

        $request->password === null ? $password = $teacher->password : $password = Hash::make($request->password);

        $teacher->update([
        'username' => $request->username,
        'password' => $password,
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'age' => $request->age,
        'advisory' => $request->advisory,
        ]);

        return back();
    }

    public function destroy($username)
    {
        Teacher::where('username', $username)->delete();

        return back();
    }
}
