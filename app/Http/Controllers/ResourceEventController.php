<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\storeEvents;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ResourceEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Event::all()->makeHidden('id');
        }

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeEvents|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeEvents $request)
    {
        if (request()->ajax()) {
            Event::create([
                'title'            => $request->title,
                'date'             => $request->date,
                'background_color' => $request->backgroundColor,
                'border_color'     => $request->borderColor,
            ]);

            return response('Event Created', 200)
                ->header('Content-Type', 'text/plain');
        }

        return back()->with('status', 'Event Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param storeEvents|Request $request
     * @return \Illuminate\Http\Response
     * @internal param Event $event
     */
    public function update(Request $request)
    {
        if (request()->ajax()) {
            $event = Event::where('background_color', $request->input('oldEvent.backgroundColor'))
                ->where('date', $request->input('oldEvent.date'))
                ->where('title', $request->input('oldEvent.title'))
                ->firstOrFail();

            $event->update([
                'date' => $request->date
            ]);

            return response('Event Edited', 200)
                ->header('Content-Type', 'text/plain');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (request()->ajax()) {
            Event::where('background_color', $request->backgroundColor)
                ->where('date', $request->date)
                ->where('title', $request->title)
                ->delete();
            return response('Event Deleted', 200)
                ->header('Content-Type', 'text/plain');
        }

        return back();
    }
}
