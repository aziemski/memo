@extends('layouts.app')

@section('content')
    <div class="container m-5">
        <h1 class="mb-4">Edit Event</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="border p-4 rounded bg-light">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}" class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date) }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date) }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description"
                          class="form-control">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL:</label>
                <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $event->image_url) }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Categories:</label>
                <div>
                    @foreach ($categories as $category)
                        <div class="form-check d-inline-block">
                            <input type="checkbox" id="category{{ $category->id }}" name="categories[]"
                                   value="{{ $category->id }}" class="form-check-input"
                                {{ $event->categories->contains($category->id) ? 'checked' : '' }}>
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
            </div>
            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-danger" name="action" value="delete">Delete</button>
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ url()->previous() }}'">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
            </div>
        </form>
    </div>
@endsection
