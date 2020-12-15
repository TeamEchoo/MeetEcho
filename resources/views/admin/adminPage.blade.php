@extends('layouts.app')
@section('content')
<div class="admin container-fluid">
    <h2>List of All events</h2>

    <a href="{{route('events.create')}}" class="admin-create-btn btn btn-primary">New Event</a>
    <div class="admin-list table-responsive-sm">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventList as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->date}}</td>
                    <td>
                        <a href="{{route('adminEventDetail', $event->id)}}" class="admin-list-btn btn btn-primary">Details</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

   

</div>


@endsection