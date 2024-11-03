@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New Event</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-container" action="{{ route('events.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="image_url">Image URL:</label>
        <input type="url" id="image_url" name="image_url">

        <div class="button-group">
            <button type="button" class="btn outline">Cancel</button>
            <button type="submit" class="btn">Save</button>
        </div>

    </form>
</div>
@endsection
