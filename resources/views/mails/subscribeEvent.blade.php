@extends('layouts.mailbase')
@section('content')


<div class="event-details container-md">

   <img src="https://estaticos.muyinteresante.es/media/cache/760x570_thumb/uploads/images/gallery/5ab105745cafe8eb5eadc7ae/myanmar.jpg" id="event-details-img" alt="...">

    <div class="event-details-info">
      <h2> {{$event->title}}</h2>
      <p> {{$event->description}}</p>
    </div>
    <div class="event-details-info">
      <h3> {{$event->date}}</h3>
      <h3> Instructor: {{$event->instructor}}</h3>
      <h3> {{$event->type}}</h3>
      <p class="event-tag"> {{$event->category}}</p>
    </div>
</div>
@endsection