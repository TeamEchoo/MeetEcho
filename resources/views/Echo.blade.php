@extends('layouts.app')
@section('content')
<div id="echoContainer" class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div id="card" class="card">
        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <link href="{{ asset('resources/sass/_variable.scss') }}" rel="stylesheet">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>EchoMeet</title>
        </head>

        <body>

          <!-- CAROUSEL -->

          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div id="carouselInner" class="carousel-inner">
              @foreach($eventList as $event)
              @if($event->highlighted)
              <div class="carousel-item active">
                <img src="http://t3.gstatic.com/images?q=tbn:ANd9GcTWoexfzoEpVYGD6LswveEBN18F_rKmR-8gluFtO29XoPhAVcPtu-0EzgsEfDC3xFghMrETTOBPA88NRyLwKMs" class="d-block w-100" alt="...">
                <div id="carouselback" class="carousel-caption d-none d-md-block">
                  <h5>{{$event->title}}</h5>
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
      </div>


      <!-- CARDS -->
      <section class="cardSection">

        @foreach($eventList as $event)
        @if(!$event->highlighted)
        <div id="card" class="card" style="width: 18rem;">
          <img src="https://estaticos.muyinteresante.es/media/cache/760x570_thumb/uploads/images/gallery/5ab105745cafe8eb5eadc7ae/myanmar.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-text">{{$event->title}}</h2>
            <p class="card-text">{{$event->description}}</p>
            <a href="http://127.0.0.1:8000/Echo/{{$event->id}}"><button>Details</button></a>
          </div>
        </div>
        @endif
        @endforeach
      </section>
      </body>

      </html>
    </div>
  </div>
</div>
@endsection