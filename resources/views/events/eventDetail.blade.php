

<h1>Hola People</h1>
    

        
    </div>

    <ul>
        <li>Titulo: {{$event->title}}</li>
        <li>Descripción: {{$event->description}}</li>
        <li>Tipo: {{$event->type}}</li>
        <li>Fecha: {{$event->date}}</li>
    </ul>
    <form action="http://127.0.0.1:8000/events/{{$event->id}}" method="post">
    @csrf
    <button type="submit" >Submit</button>
    </form>
    



    
    