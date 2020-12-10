@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Admin Page</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Capacity</th>
                <th scope="col">Instructor</th>
                <th scope="col">Register Users</th>
                <th scope="col">Highlighted</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventList as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->title}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->date}}</td>
                <td>{{$event->type}}</td>
                <td>{{$event->category}}</td>
                <td>{{$event->capacity}}</td>
                <td>{{$event->instructor}}</td>
                <td>
                    @foreach($event->users as $user)
                    {{$user->name}}
                    @endforeach
                </td>

                @if($event->highlighted)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <form action="{{route('eventsDelete', $event->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <a href="{{route('events.create')}}" class="btn btn-primary">New Event</a>

</div>


@endsection