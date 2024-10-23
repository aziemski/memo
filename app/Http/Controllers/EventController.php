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

        $req->validate([
            'name' => 'required|max:2',
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

}
