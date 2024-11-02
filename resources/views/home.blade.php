@extends('layouts.app')

@section('content')
    <div id="timeline-embed"></div>
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
