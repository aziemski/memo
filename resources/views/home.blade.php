@extends('layouts.app')

@section('content')
    @if($events->isEmpty())
        <div class="alert alert-info text-center my-5">
            No events.
        </div>
    @else
        <div id="timeline-embed" class="min-vh-100"></div>

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
    @endif

@endsection
