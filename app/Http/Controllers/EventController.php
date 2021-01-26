<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Mail\SubscribeEventMailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $eventList = Event::all()->where('date', '>=', Carbon::now());
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

        $user = $request->user();
        if ($user->events()->find($id)) {
            return back();
        }
        $event = Event::find($id);

        $event->addUser($user->id);

        $usermail = $user->email;

        $correo = new SubscribeEventMailable($event);
        Mail::to($usermail)->send($correo);

        return view('users.profile', ['user' => $user]);
    }

    public function unSubscribe(Request $request, $id)
    {

        $user = $request->user();
        Event::find($id)->removeUser($user->id);

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

        $this->validator($request);
        Event::create($request->all());

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
        return view('eventsEdit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validator($request);
        Event::find($id)->update($request->all());

        return back();
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

    public function validator(Request $request)
    {

        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date|after:now',
            'type' => 'required',
            'category' => 'required',
            'capacity' => 'required|gte:0',
            'instructor' => 'required',
            'link' => 'required',
        ]);
    }
}
