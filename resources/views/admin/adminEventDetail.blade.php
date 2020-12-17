@extends('layouts.app')
@section('content')
<h2 class="title">Admin Page</h2>
<div class="admin-details container-fluid">
    <h2>
        {{$event->title}}
    </h2>
    <h4>Description</h4>
    <p>{{$event->description}}</p>
    <div class="row justify-content-start">
        <h4 class="col-5">Instructor/a</h4>
        <p class="col">{{$event->instructor}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col-5">Capacity</h4>
        <p class="col">{{$event->capacity}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col-5">Type</h4>
        <p class="col">{{$event->type}}</p>
    </div>
    <div class="row justify-content-start">
        <h4 class="col-5">Category</h4>
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
    <div class="admin-details-highlighted row justify-content-start">
        <h4 class="col-5">Event Highlighted?</h4>
        <form action="{{route('changeHighlighted', $event->id)}}" method="POST">
            @csrf
            <button class="col-sm" type="submit">
                @if($event->highlighted)
                <i id="star-fill" class="fas fa-star"></i>
                @else
                <i id="star" class="far fa-star"></i>
                @endif
            </button>

        </form>

    </div>

    <div class="admin-details-actions">
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