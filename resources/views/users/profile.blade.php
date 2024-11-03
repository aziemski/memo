@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $user->name }}</h2>
    <p>{{ $user->email }}</p>
    <div>
        <p><strong>Joined on:</strong> {{ $user->created_at->format('F d, Y') }}</p>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn">Logout</button>
    </form>
</div>
@endsection
