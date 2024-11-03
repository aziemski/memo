@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="form-container" action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}" required>

        <label for="start_date">Start Date:</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date) }}" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date) }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description', $event->description) }}</textarea>


        <label for="image_url">Image URL:</label>
        <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $event->image_url) }}">


        <div class="button-group">
            <button type="submit" class="btn outline" name="action" value="delete">Delete</button>
            <button type="button" class="btn outline" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
            <button type="submit" class="btn" name="action" value="save">Save</button>
        </div>
    </form>
</div>
@endsection
