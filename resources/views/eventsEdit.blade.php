@extends('layouts.app')
@section('content')
<div class="event-form container">
    <h2>Edit Event</h2>
    <a href="{{ route('admin') }}"><i class="fas fa-arrow-left"></i></a>

    <form action="{{ route('eventsUpdate', $event->id) }}" id="createEventForm" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="validationServer01">Event Name</label>
            <input type="text" class="@error('title') is-invalid @enderror form-control" id="validationServer01" value="{{ $event->title }}" required name="title">
            @error('title')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="validationServer02">Description</label>
            <textarea type="text" class="@error('description') is-invalid @enderror form-control" id="validationServer01" value="{{ $event->description }}" required name=" description"></textarea>
            @error('description')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="validationServer02">Maximun People</label>
            <input type="number" class="@error('capacity') is-invalid @enderror form-control" id="validationServer01" value="{{ $event->capacity }}" required name="capacity">
            @error('capacity')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="validationServer03">Date</label>
            <input type="date" class="@error('date') is-invalid @enderror form-control" id="validationServer03" aria-describedby="validationServer03Feedback" value="{{$event->date}}" required name="date">
            @error('date')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="validationServer02">Instructor</label>
            <input type="text" class="@error('instructor') is-invalid @enderror form-control" id="validationServer02" aria-describedby="validationServer03Feedback" value="{{ $event->instructor}}" required name="instructor">
            @error('instructor')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="validationServer02">Link</label>
            <input type="text" class="@error('link') is-invalid @enderror form-control" id="validationServer02" aria-describedby="validationServer03Feedback" value="{{ $event->link}}" required name="link">
            @error('link')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="validationServer02">Type</label>
            <select class="custom-select" required name="type">
                <option value="">Choose Type</option>
                <option value="masterclass">Masterclass</option>
                <option value="workshop">Workshop</option>
                <option value="talk">Talk</option>
            </select>
            <p class="valid-feedback">Looks Good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" id="validationServer02" value="{{ $event->category}}" required name="category">
            @error('link')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection