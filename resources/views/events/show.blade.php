<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
</head>
<body>
<div class="container">
    <h2>Event Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $event->name }}</h4>
            <p class="card-text"><strong>Start Date:</strong> {{ $event->start_date }}</p>
            <p class="card-text"><strong>End Date:</strong> {{ $event->end_date }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
            @if($event->image_url)
                <p class="card-text"><strong>Image:</strong></p>
                <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="img-fluid">
            @endif
        </div>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
</div>
</body>
</html>
