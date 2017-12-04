<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;

class ResourceAssignmentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Assignment::all();
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        //
    }
}
