<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function index(Request $request)
    {
        Log::info("events.index", ['url'=>$request->url()]);
        $events = Event::all();
        return view('events.index', compact('events'));
    }

}
