@extends('layouts.app')

@section('content')
    @if($events->isEmpty())
        <div class="alert alert-info text-center">
            No events.
        </div>
    @else
    <div id="timeline-embed" class="d-flex align-items-center justify-content-center min-vh-100 px-30 py-30"
         style="max-height: calc(100vh - 80px)"></div>
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
