<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function index(Request $req)
    {
        Log::info("events.index", ['req'=>$req->url()]);
        $perPage = $req->input('per_page', 10);
        $events = Event::orderBy('start_date', 'asc')->paginate($perPage);
        return view('events.index', compact('events', 'perPage'));
    }

    public function create(Request $req)
    {
        Log::info("events.create", ['req'=>$req]);

        return view('events.create');
    }

    public function store(Request $req)
    {
        Log::info("events.store", ['req'=>$req->url()]);


        // TODO allow to create events without descriptions
        // TODO handle sql exceptions nicely

        $req->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'string',
            'image' => 'nullable|url',
        ]);

        Event::create([
            'name' => $req->input('name'),
            'start_date' => $req->input('start_date'),
            'end_date' => $req->input('end_date'),
            'description' => $req->input('description'),
            'image_url' => $req->input('image_url'),
        ]);

        return redirect()->route('events.index');
    }

    public function delete(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }

    public function edit(Event $event)
    {
        // Return the edit view with the event details
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $event->update([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
        ]);

        return redirect()->route('events.index');
    }
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
