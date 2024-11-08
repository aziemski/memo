@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card p-4">
            <h2 class="mb-3">{{ $user->name }}</h2>
            <p class="text-muted mb-2">{{ $user->email }}</p>
            <div class="mb-4">
                <p><strong>Joined on:</strong> {{ $user->created_at->format('F d, Y') }}</p>
            </div>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
@endsection
