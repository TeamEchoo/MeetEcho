@extends('layouts.app')
@section('content')


<div class="container">

        <h2> {{$event->title}}</h2>
        <h3> {{$event->description}}</h3>
        <h3> {{$event->type}}</h3>
        <h3> {{$event->date}}</h3>
    
    <form action="{{route('events')}}/{{$event->id}}" method="post">
    @csrf
    <button class="btn btn-primary" type="submit" >Submit</button>
    </form>
 </div>   
    @endsection



    
    