<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateImage;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class ResourceImageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        if(request()->ajax() && $request->has('path')) {
            return Image::where('path', $request->query('path'))->first();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateImage $request)
    {
        $request->title = ($request->title !== null) ? $request->title : '';
        $request->description = ($request->description !== null) ? $request->description : '';

        $image = Image::where('type', $request->type)
            ->where('title', $request->title)
            ->where('description', $request->description)
            ->where('position', $request->position)
            ->first();

        $path = $image->path;
        $ext = $image->ext;

        switch ($request->type) {
            case 'slideshow':
                $folder = 'sports';
                break;
            case 'whyJil':
                $folder = 'why';
                break;
            case 'tracks':
                $folder = 'tracks';
                break;
        }

        if ($request->hasFile('path')) {
            $file = $request->file('path')->store("images/$folder", 'public');
            $exists = Storage::disk('public')->url($file);
//            dd($exists);
            $segments = explode('/', $exists);
            $noExt = explode('.', $segments[6]);
//            dd($segments);
            $path = $segments[4].'/'.$segments[5].'/'.$noExt[0];
//            dd($path);
            $ext = \File::extension($exists);
//            dd($exists);
        }

//        return "request has no file";
        $image->update([
            'path' => $path,
            'ext' => $ext,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'position' => $request->position,
        ]);

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
