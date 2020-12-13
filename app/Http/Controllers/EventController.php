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

    public function adminIndex()
    {
        $eventList = Event::all();
        return view('admin.adminPage', ['eventList' => $eventList]);
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
        return view('users.profile', ['user' => $user]);
    }


    public function create()
    {
        return view('CreateEvents');
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

    public function adminShowEvent($id)
    {

        $event = Event::find($id);
        return view('admin.adminEventDetail', ['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function changeHighlighted($id)
    {
        $event = Event::find($id);
        $event->highlighted = !$event->highlighted;
        $event->update(['highlighted' => $event->highlighted]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, $id)
    {
        $event = Event::find($id);
        $event->edit();
        redirect(route('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, $id)
    {
        $event->validate($request, ['title' => 'required', 'description' => 'required', 'date' => 'required', 'type' => 'required', 'category' => 'required', 'capacity' => 'required', 'instructor' => 'required']);

        Event::find($id)->update($request->all());
        return redirect()->route('home')->with('actualizado');
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
        $eventList = Event::all();

        return view('admin.adminPage', ['eventList' => $eventList]);
    }
}
