@extends('layouts.app')
@section('content')
<div id="createEvent" class="container">
    <h1>Create your Amazing Event</h1>

    <form action="{{ route('events.store') }}" id="createEventForm" method="POST">
        @csrf
        <div class="mb-3">
            <label for="validationServer01">Event Name</label>
            <input type="text" class="form-control is-valid" id="validationServer01" value="" required name="title">
            <p class="valid-feedback">Looks good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Description</label>
            <input type="text" class="form-control is-valid" id="validationServer02" value="" required name="description">
            <p class="invalid-feedback">Please add a description </p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Location</label>
            <input type="text" class="form-control is-valid" id="validationServer02" value="" required name="location">
            <p class="valid-feedback">Let's go!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Maximun People</label>
            <input type="number" class="form-control is-valid" id="validationServer02" value="" required name="capacity">
            <p class="valid-feedback">Looks good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer03">Date</label>
            <input type="date" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required name="date">
            <p id="validationServer03Feedback">Please provide a valid date</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Instructor</label>
            <input type="text" class="form-control is-valid" id="validationServer02" aria-describedby="validationServer03Feedback" value="" required name="instructor">
            <p id="validationServer03Feedback" class="valid-feedback">Looks Good!</p>
        </div>

        <div class="mb-3">
            <label for="validationServer02">Link</label>
            <input type="text" class="form-control is-valid" id="validationServer02" aria-describedby="validationServer03Feedback" value="" required name="link">
            <p id="validationServer03Feedback" class="valid-feedback">Looks Good!</p>
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
            <select class="custom-select" required name="category">
                <option value="">Choose Category</option>
                <option value="masterclass">PHP</option>
                <option value="workshop">Javascript</option>
                <option value="talk">laravel</option>
            </select>
            <p class="valid-feedback">Looks Good!</p>
        </div>



        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
</div>
@endsection