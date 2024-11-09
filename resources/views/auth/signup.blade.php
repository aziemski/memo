@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="auth-container card p-5 mx-auto" style="max-width: 400px;">
            <h1 class="mb-4 text-center">Signup</h1>

            @if($errors->any())
                <div class="alert alert-danger" id="error-message">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form id="form" action="{{ route('signup') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                    <span class="input-group-text" id="name-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/>
                        </svg>
                    </span>
                        <input type="text" name="name" id="name-input" placeholder="Name" class="form-control" required aria-describedby="name-addon">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="email-addon">@</span>
                        <input type="email" name="email" id="email-input" placeholder="Email" class="form-control" required aria-describedby="email-addon">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                    <span class="input-group-text" id="password-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                            <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/>
                        </svg>
                    </span>
                        <input type="password" name="password" id="password-input" placeholder="Password" class="form-control" required aria-describedby="password-addon">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                    <span class="input-group-text" id="repeat-password-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                            <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/>
                        </svg>
                    </span>
                        <input type="password" name="password_confirmation" id="repeat-password-input" placeholder="Repeat Password" class="form-control" required aria-describedby="repeat-password-addon">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Signup</button>
            </form>

            <p class="text-center mt-4">Already have an Account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
@endsection
