@extends('layouts.app')
@section('content')


<h1>Profile Page</h1>

<div class="container">


    
    <h3>Usuario: {{$user->name}}</h>
    <h3>Email: {{$user->email}}</h3>
    

        <h2 id="userEvents">EVENTOS A LOS QUE ESTAS INSCRITO:</h2>
    

    <ol class="list-group">
        @foreach ($user->events as $event) 
        
            <li class="list-group-item">
            {{$event->title}}
            </li>
        
        @endforeach
    </ol>
</div>  
@endsection;
    