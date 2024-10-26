@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Event</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Event Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}" required>
        </div>


        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $event->image_url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
