<?php

namespace App\Http\Controllers;

use App\Models\Event;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function index(Request $req)
    {
        Log::info("events.index", ['req'=>$req->url()]);
        $perPage = $req->input('per_page', 10);
        $events = Event::paginate($perPage);
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
        return redirect()->route('events.index');
    }

}
