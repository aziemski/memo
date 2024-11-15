<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Memo') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/timeline.js'])
</head>
<body>
<nav class="navbar navbar-expand navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
            >

                <title>Memo</title>
                <g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="timeline" fill="#000000">
                        <path
                            d="M9.17070571,17 C9.58254212,15.8348076 10.6937812,15 12,15 C13.3062188,15 14.4174579,15.8348076 14.8292943,17 L20,17 L21,18 L20,19 L14.8292943,19 C14.4174579,20.1651924 13.3062188,21 12,21 C10.6937812,21 9.58254212,20.1651924 9.17070571,19 L3,19 L4,18 L3,17 L9.17070571,17 Z M12,19 C12.5522847,19 13,18.5522847 13,18 C13,17.4477153 12.5522847,17 12,17 C11.4477153,17 11,17.4477153 11,18 C11,18.5522847 11.4477153,19 12,19 Z M14,12 L12,14 L10,12 L7,12 C5.8954305,12 5,11.1045695 5,10 L5,5 C5,3.8954305 5.8954305,3 7,3 L17,3 C18.1045695,3 19,3.8954305 19,5 L19,10 C19,11.1045695 18.1045695,12 17,12 L14,12 Z M7,5 L7,10 L11,10 L12,11 L13,10 L17,10 L17,5 L7,5 Z"
                            id="Shape">

                        </path>
                    </g>
                </g>
            </svg>
        </a>

        <ul class="navbar-nav me-auto">
            <li class="d-flex align-items-center">
                @auth
                    <a class="btn btn-sm btn-primary" href="{{ route('events.create') }}">+ Add Event</a>
                @endauth
            </li>

            @if(Route::is('home'))
                <li class="nav-item dropdown">
                    <form id="categoryForm" action="{{ route('home') }}" method="GET">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </a>

                        <ul class="dropdown-menu p-3" aria-labelledby="categoryDropdown" style="min-width: 200px;"
                            data-bs-auto-close="outside">
                            @foreach ($categories as $category)
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                               id="category{{ $category->id }}" name="categories[]"
                                            {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                               for="category{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                            <li class="dropdown-divider"></li>

                            <li class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-secondary" href="{{ route('home') }}">Clear</a>
                                <button type="submit" class="btn btn-sm btn-primary" id="applySelection">Apply</button>
                            </li>
                        </ul>
                    </form>
                </li>
            @endif

        </ul>

        <ul class="navbar-nav ms-auto">
            @if(Route::is('home'))
                <li class="nav-item">
                    <button id="toggleViewBtn" class="nav-link btn btn-sm">List</button>
                </li>
            @endif
            <li class="nav-item">
                @if (Auth::check())
                    <a href="{{ route('users.me') }}" class="nav-link btn btn-primary">Me</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link btn btn-primary">Login</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
<main class="container mt-0">
    @yield('content')
</main>
</body>
</html>
