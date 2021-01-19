@extends('layouts.app')
@section('content')



<div class="profile container">
    <section class="profile-info">
        <img src="https://loremflickr.com/100/100/faces" alt="">
        <h2>{{$user->name}}</h2>

    </section>

    <section class="profile-events">

        <h3>EVENTOS A LOS QUE ESTAS INSCRITO:</h3>

        <ul>
            @foreach ($user->events as $event)

            <li class="profile-events-item">
                <h4>
                    {{$event->title}}

                </h4>
                <form action="{{route('unsubscribe', $event->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Cancel
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection;
