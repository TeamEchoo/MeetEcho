@extends('layouts.app')
@section('content')


<div class="event-details container-md">

   <figure class="figure">
      <img src="https://loremflickr.com/720/500/computer?random={{mt_rand()}}" id="event-details-img" alt="...">
      <h3> {{$event->date}}</h3>
   </figure>

   <div class="event-details-info">
      <h2> {{$event->title}} </h2>
      <h5> - {{$event->type}} - </h5>
      <p> {{$event->description}}</p>
      @if(Auth::user() && Auth::user()->events()->find($event->id))
         <h5>Attending</h5>
      @else
      <form action="{{ route('eventAdd', $event->id) }}" method="POST">
         @csrf
         <button class="btn btn-primary" type="submit">Attend</button>
      </form>
      @endif
   </div>
   <div class="event-details-info">
      <h4>Instructor: {{$event->instructor}}</h4>

      <h4>Subject: {{$event->category}}</h4>
   </div>
</div>
@endsection