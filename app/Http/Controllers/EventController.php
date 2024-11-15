<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function home(Request $req)
    {
        $logged = Auth::check();
        $selectedCategories = $req->query('categories', []);

        if (!empty($selectedCategories)) {
            $events = Event::whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('categories.id', $selectedCategories);
            })
                ->orderBy('start_date', 'asc')
                ->get();
        } else {
            $events = Event::orderBy('start_date', 'asc')
                ->get();
        }

        $events = $events->map(function ($event) use ($logged) {
            $startDate = Carbon::parse($event->start_date);
            $endDate = Carbon::parse($event->end_date);

            $text = $event->description;
            $categories = $event->categories;

            if (!empty($categories)) {
                $categoryBadges = $categories->map(function ($category) {
                    $textColor = $category->color ? 'text-light' : 'text-dark';
                    $backgroundStyle = $category->color ? "background-color: {$category->color}; padding: 8px;" : '';

                    return <<<HTML
                    <span class="badge rounded-pill $textColor" style="$backgroundStyle">
                        {$category->name}
                    </span>
                HTML;
                })->join(' ');

                $text = $text . '<br/><br/>' . $categoryBadges;
            }

            if ($logged) {
                $text = $text . '<br/><br/><a href="/events/' . $event->id . '/edit" target="_self" class="btn outline">Edit</a>';
            }

            $formattedEvent = [
                "id" => $event->id,
                "unique_id" => $event->id,
                "start_date" => [
                    "year" => $startDate->format('Y'),
                    "month" => $startDate->format('m'),
                    "day" => $startDate->format('d')
                ],
                "end_date" => [
                    "year" => $endDate->format('Y'),
                    "month" => $endDate->format('m'),
                    "day" => $endDate->format('d')
                ],
                "text" => [
                    "headline" => $event->name,
                    "text" => $text
                ]
            ];

            if (!empty($event->image_url)) {
                $formattedEvent["media"] = [
                    "url" => $event->image_url
                ];
            }

            return $formattedEvent;
        });

        $categories = Category::orderBy('name', 'asc')->get();

        return view('home', compact(
            'events',
            'categories',
            'selectedCategories',
        ));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $event = Event::create([
            'name' => $req->input('name'),
            'start_date' => $req->input('start_date'),
            'end_date' => $req->input('end_date'),
            'description' => $req->input('description'),
            'image_url' => $req->input('image_url'),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        $event->categories()
            ->sync($req->input('categories', []));

        return redirect()->route('home');
    }

    public function create()
    {
        $categories = Category::all();

        return view('events.create', compact('categories'));
    }

    public function edit(Event $event)
    {
        $categories = Category::orderBy('name', 'asc')
            ->get();
        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        if ($request->input('action') === 'delete') {
            $event->delete();
            return redirect()->route('home');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $event->update([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
            'updated_by' => auth()->id(),
        ]);

        $event->categories()
            ->sync($request->input('categories', []));

        return redirect()->route('home');
    }

    public function delete(Event $event)
    {
        $event->delete();

        return redirect()->route('home');
    }
}
