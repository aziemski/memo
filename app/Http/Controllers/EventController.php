<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function index(Request $req)
    {
        Log::info("events.index", ['req'=>$req]);
        $perPage = $req->input('per_page', 10);
        $events = Event::paginate($perPage);
        return view('events.index', compact('events', 'perPage'));
    }

}
