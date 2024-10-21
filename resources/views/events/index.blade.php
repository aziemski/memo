<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
</head>
<body>
<div class="container">
    <h2>All Events</h2>

    @if($events->isEmpty())
        <p>No events found.</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $events->appends(['per_page' => $perPage])->links() }}
    @endif
</div>
</body>
</html>
