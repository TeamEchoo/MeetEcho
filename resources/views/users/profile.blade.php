

<h1>Profile Page</h1>


    <ul>
        <li>Titulo: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
    </ul>


        @foreach ($user->event as $event) 
            <li>
            {{$event->title}}
            </li>
        @endforeach

    


    
    