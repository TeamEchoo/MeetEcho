

<h1>Hola People</h1>

@foreach($eventList as $event)
    <ul>
        <li>Titulo: {{$event->title}}</li>
        <li>Descripción: {{$event->description}}</li>
        <li>Tipo: {{$event->type}}</li>
        <li>Fecha: {{$event->date}}</li>
    </ul>
    <a href="http://127.0.0.1:8000/events/{{$event->id}}"><button>Details</button></a>
@endforeach;
    


    
    