@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Edit Category</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <div class="form-group d-flex align-items-center mt-3">
                <input type="color" name="color" id="color" class="form-control form-control-color me-2"
                       style="width: 50px; height: 35px;"
                       value="{{ $category->color ?? '#d3d3d3' }}"
                    {{ $category->color ? '' : 'disabled' }}>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="disableColor" onclick="toggleColorInput()"
                        {{ $category->color ? '' : 'checked' }}>
                    <label class="form-check-label" for="disableColor">No Color</label>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    @vite(['resources/js/category.js'])

@endsection
