@extends('layouts.app')
@section('content')
<div id="createEvent" class="container">
    <h1>Create your Amazing Event</h1>

    <form id="createEventForm">
        <div class="mb-3">
            <label for="validationServer01">Event Name</label>
            <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
            <p class="valid-feedback">Looks good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Description</label>
            <input type="text" class="form-control is-valid" id="validationServer02" value="" required>
            <p class="invalid-feedback">Please add a description </p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Location</label>
            <input type="text" class="form-control is-valid" id="validationServer02" value="" required>
            <p class="valid-feedback">Let's go!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Maximun People</label>
            <input type="number" class="form-control is-valid" id="validationServer02" value="" required>
            <p class="valid-feedback">Looks good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer03">Date</label>
            <input type="date" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
            <p id="validationServer03Feedback" class="invalid-feedback">Please provide a valid date</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02  ">Instructor</label>
            <input type="text" class="form-control is-valid" id="validationServer02" aria-describedby="validationServer03Feedback" value="" required>
            <p id="validationServer03Feedback" class="valid-feedback">Looks Good!</p>
        </div>

        <div class="mb-3">
            <label for="validationServer02">Type</label>
            <select class="custom-select" required>
                <option value="">Choose Type</option>
                <option value="masterclass">Masterclass</option>
                <option value="workshop">Workshop</option>
                <option value="talk">Talk</option>
            </select>
            <p class="valid-feedback">Looks Good!</p>
        </div>
        <div class="mb-3">
            <label for="validationServer02">Category</label>
            <select class="custom-select" required>
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