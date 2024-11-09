@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="auth-container card p-5 mx-auto" style="max-width: 400px;">
            <h1 class="mb-4 text-center">Login</h1>
            @if($errors->any())
                <div class="alert alert-danger" id="error-message">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form id="form" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="email-addon">@</span>
                        <input type="email" name="email" id="email-input" placeholder="Email" class="form-control"
                               required aria-describedby="email-addon">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                    <span class="input-group-text" id="password-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                            <path
                                d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/>
                        </svg>
                    </span>
                        <input type="password" name="password" id="password-input" placeholder="Password"
                               class="form-control" required aria-describedby="password-addon">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <p class="text-center mt-4">New here? <a href="{{ route('signup') }}">Create an Account</a></p>
        </div>
    </div>
@endsection
