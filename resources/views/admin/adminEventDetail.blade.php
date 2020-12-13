@extends('layouts.app')
@section('content')
<div id="admin-details" class="container-fluid">
    <h2>
        {{$event->title}}
    </h2>
    <h4>Description</h4>
    <p>{{$event->description}}</p>
    <div class="row justify-content-start">
        <h4 class="col">Instructor</h4>
        <p class="col">{{$event->instructor}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col">Capacity</h4>
        <p class="col">{{$event->capacity}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col">Type</h4>
        <p class="col">{{$event->type}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col">Category</h4>
        <p class="col">{{$event->category}}</p>
    </div>
    <h4>Attendees</h4>
    <ul>
        @foreach($event->users as $user)
        <li>
            {{$user->name}}
        </li>
        @endforeach
    </ul>
    <div class="row justify-content-start">
        <h4 class="col">Event Highlighted?</h4>
        <form action="{{route('changeHighlighted', $event->id)}}" method="POST">
            @csrf
            @if($event->highlighted)
            <button type="submit" class="btn btn-success">
                Yes
            </button>
            @else
            <button type="submit" class="btn btn-danger">
                No
            </button>
            @endif
        </form>

    </div>

    <div id="admin-event-actions">
        <a href="{{route('eventsEdit', $event->id)}}" class="btn btn-primary">
            Edit
        </a>
        <form action="{{route('eventsDelete', $event->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>

    </div>
</div>

@endsection