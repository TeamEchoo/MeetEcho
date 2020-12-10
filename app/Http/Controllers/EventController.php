<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventList = Event::all();

        return view('events.events', ['eventList' => $eventList]);
    }

    public function showEvent($id)
    {

        $event = Event::find($id);
        return view('events.eventDetail', ['event' => $event]);
    }

   

    public function subscribe(Request $request, $id)
    {

        if (!Auth::check()) {

            return view('auth.register');
        }


        $user = $request->user();
        $user->events()->attach($id);
        return view('./users.profile', ['user' => $user]);        
    }


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'date'          => $request->date,
            'type'          => $request->type,
            'category'      => $request->category,
            'capacity'      => $request->capacity,
            'instructor'    => $request->instructor,
            'link'          => $request->link,
            // 'location'    => $request->location
            // 'highlighted'   => $request->highlighted
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        redirect(route('home'));
    }
}
