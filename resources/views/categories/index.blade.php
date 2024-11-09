@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Categories</h1>

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

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group d-flex align-items-center mt-3">
                <input type="color" name="color" id="color" class="form-control form-control-color me-2"
                       style="width: 50px; height: 35px;" value="{{ $category->color ?? '#D3D3D3' }}">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="disableColor" onclick="toggleColorInput()">
                    <label class="form-check-label" for="disableColor">No Color</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Add Category</button>
        </form>

        <table class="table mt-4">
            <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->color)
                            <span
                                style="background-color: {{ $category->color }}; padding: 5px 10px; border-radius: 4px; color: #fff;">
                                {{ $category->color }}
                            </span>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @vite(['resources/js/category.js'])

@endsection
