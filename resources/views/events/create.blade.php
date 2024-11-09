@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">New Event</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" class="border p-4 rounded bg-light">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL:</label>
                <input type="url" id="image_url" name="image_url" class="form-control">
            </div>

            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label">Categories:</label>
                </div>

                @foreach ($categories as $category)
                    <div class="form-check d-inline-block mb-2">
                        <input type="checkbox" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="form-check-input">
                        <label for="category{{ $category->id }}"
                               class="badge rounded-pill {{ $category->color ? 'text-light' : 'text-dark' }}"
                               @if ($category->color) style="background-color: {{ $category->color }}; padding: 8px;" @endif>
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach

                <div class="d-flex">
                    <a href="{{ route('categories.index') }}" class="text-primary">Manage Categories</a>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
