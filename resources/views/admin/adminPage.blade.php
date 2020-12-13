@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2>Admin Page</h2>

    <div id="admin-list" class="table-responsive-sm">

        <table id="admin-list-table" class="table table-hover">
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
                        <a href="{{route('adminEventDetail', $event->id)}}" class="btn btn-primary">Details</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{route('events.create')}}" class="btn btn-primary">New Event</a>

</div>


@endsection