
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Events</h2>

        <a href="{{ route('events.create') }}" class="btn btn-success mb-4">Create New Event</a>

    @if($events->isEmpty())
            <p>No events found.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Show</a>

                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('events.delete', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <section class="timeline">
                <ul>
                    @foreach($events as $event)
                    <li>
                        <div>
                            <time>
                                {{ $event->start_date }} {{ $event->name }}
                            </time>
                            {{ $event->description }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </section>
        @endif
    </div>
@endsection
