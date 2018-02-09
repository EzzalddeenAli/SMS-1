<?php

namespace App\Http\Controllers;

use App\EducationalBackground;
use App\FamilyBackground;
use App\Grade;
use App\Http\Requests\storeStudent;
use App\Http\Requests\updateStudent;
use App\PersonalData;
use App\Section;
use ErrorException;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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
        //try the given data
        try {
            DB::transaction(function () {

                $request = request();
                $student = Student::create([
                    'username'    => $request->username,
                    'password'    => Hash::make($request->password),
                    'first_name'  => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name'   => $request->last_name,
                    'age'         => $request->age,
                    'section_id'  => $request->section_id,
                ]);

                //find section's subjects then foreach grade add student
                $section = Section::find($request->section_id);

                foreach ($section->subjects as $subject) {
                    Grade::create([
                        'subject_id' => $subject->id,
                        'student_id' => $student->id,
                    ]);
                }

                //merge request all with polymorphic data
                PersonalData::create(array_merge($request->all(), ['user_id' => $student->id, 'user_type' => 'App\Student']));
                FamilyBackground::create(array_merge($request->all(), ['user_id' => $student->id, 'user_type' => 'App\Student']));

                foreach ($request->level as $name => $value) {
                    EducationalBackground::create([
                        'level'          => $name,
                        'name_of_school' => $value['name_of_school'],
                        'year_attended'  => $value['year_attended'],
                        'honors_awards'  => $value['honors_awards'],
                        'user_id'        => $student->id,
                        'user_type'      => 'App\Student',
                    ]);
                }

            }, 5);

        } catch (\Exception $e) {
            //if data failed restart again
            return redirect()->route('admin.find.basic', ['user' => 'student', 'func' => 'student-list'])->withErrors(['Database error, Failed to add student.']);
        }
        return redirect()->route('admin.find.basic', ['user' => 'student', 'func' => 'student-list']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
        if (request()->ajax()) {
            return Student::with([
                'personalData',
                'familyBackground',
                'educationalBackground'
            ])->where('username', $username)->first();
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
        try {
            DB::transaction(function () {
                $request = request();
                $student = Student::find($request->id);

                $request->password === null ? $password = $student->password : $password = Hash::make($request->password);
                $student->update([
                    'username'    => $request->username,
                    'password'    => $password,
                    'first_name'  => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name'   => $request->last_name,
                    'age'         => $request->age,
                    'advisory'    => $request->advisory,
                    'section_id'  => $request->section_id !== null ? $request->section_id : $student->section_id,
                ]);

//                $student->personalData()->update($request->all());
//                $student->familyBackground()->update($request->all());
            }, 5);

            return back();

        } catch (\Exception $e) {
            //if data failed restart again
            return back()->withErrors(['Database error, Failed to edit student.']);
        }
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
