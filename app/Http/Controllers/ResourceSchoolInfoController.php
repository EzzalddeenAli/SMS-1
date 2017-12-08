<?php

namespace App\Http\Controllers;

use App\School_information;
use Illuminate\Http\Request;

class ResourceSchoolInfoController extends Controller
{
    public function index()
    {
        return School_information::first();
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'school_name'   => 'bail|required|string',
            'address'       => 'bail|required|string',
            'city'          => 'bail|nullable|string',
            'state'         => 'bail|nullable|string',
            'zip'           => 'bail|nullable|numeric',
            'phone'         => 'bail|required|string',
            'administrator' => 'bail|required|string',
            'website'       => 'bail|nullable|string',
            'short_name'    => 'bail|required|string',
            'school_number' => 'bail|nullable|string',
        ]);

        $school_info = School_information::firstOrFail();
        $school_info->update($validatedData);

        return back()->with('status', 'School Information Updated');
    }
}
