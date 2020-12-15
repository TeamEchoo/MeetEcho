@extends('layouts.app')
@section('content')
<div id="echoContainer" class="justify-content-center container">
  <section id="carousel" class="col-md-8">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol id="carousel-indicators" class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div id="carouselInner" class="carousel-inner">
        @foreach($eventList as $event)
        @if($event->highlighted)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
           <img src="https://i.picsum.photos/id/0/5616/3744.jpg?hmac=3GAAioiQziMGEtLbfrdbcoenXoWAW-zlyEAMkfEdBzQ" class="d-block w-100" alt="...">
          <!-- <img src="http://t3.gstatic.com/images?q=tbn:ANd9GcTWoexfzoEpVYGD6LswveEBN18F_rKmR-8gluFtO29XoPhAVcPtu-0EzgsEfDC3xFghMrETTOBPA88NRyLwKMs" class="d-block w-100" alt="photo of event"> -->
          <div id="carouselback" class="carousel-caption d-md-block">
            <h2>{{$event->title}}</h2>
            <h2>{{$event->date}}</h2>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <!-- CARDS -->
  <section class="cardSection">

    @foreach($eventList as $event)
    @if(!$event->highlighted)
    <div id="card" class="card" style="width: 18rem;">
      <img src="https://estaticos.muyinteresante.es/media/cache/760x570_thumb/uploads/images/gallery/5ab105745cafe8eb5eadc7ae/myanmar.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h2 class="card-text">{{$event->title}}</h2>
        <p class="card-text">{{$event->description}}</p>
        <a href="{{route('eventDetails', $event->id)}}" class="btn btn-primary">Details</a>
      </div>
    </div>
    @endif
    @endforeach
  </section>
</div>

<footer id="footer">
              <img id="img-responsive" src="https://i.ibb.co/9cHVBJC/73825455.png" alt="73825455">
              <p class="text-muted"> © 2020 By EchoTeam ♥️ </p>
</footer>
@endsection