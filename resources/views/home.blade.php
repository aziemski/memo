@extends('layouts.app')

@section('content')
    @if($events->isEmpty())
        <div class="alert alert-info text-center my-5">
            No events.
        </div>
    @else
        <div id="timeline-embed" class="min-vh-100"></div>

        <div id="list-view" class="d-none">
            <ul class="list-group">
                @foreach($events as $event)
                    <li class="list-group-item">
                        <h5>{{ $event['text']['headline'] }}</h5>
                        <div class="event-description">{!! $event['text']['text'] !!}</div>
                        <small>
                            Start: {{ $event['start_date']['year'] }}-{{ $event['start_date']['month'] }}
                            -{{ $event['start_date']['day'] }}
                            @if(!empty($event['end_date']))
                                | End: {{ $event['end_date']['year'] }}-{{ $event['end_date']['month'] }}
                                -{{ $event['end_date']['day'] }}
                            @endif
                        </small>
                    </li>
                @endforeach
            </ul>
        </div>

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
