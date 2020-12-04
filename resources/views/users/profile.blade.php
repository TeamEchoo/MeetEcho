

<h1>Profile Page</h1>


    <ul>
        <li>Usuario: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
    </ul>

    <ol>EVENTOS A LOS QUE ESTAS INSCRITO:<br>
        @foreach ($user->events as $event) 
        <br>
            <li>
            {{$event->title}}
            </li>
        
        @endforeach
    </ol>

    


    
    