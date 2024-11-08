@extends('layouts.app')

@section('content')
    <div id="timeline-embed" class="d-flex align-items-center justify-content-center min-vh-100 p-3"></div>
    <script>
        const timelineData = {
            "title": {
                "text": {
                    "headline": "My Memo",
                    "text": "Enjoy."
                }
            },
            "events": @json($events)
        };
    </script>

    @vite(['resources/js/timeline.js'])

@endsection
