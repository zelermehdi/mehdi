<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->where('is_active', true)
            ->orderByRaw('starts_at is null, starts_at asc')
            ->paginate(12);

        return view('events.index', compact('events'));
    }
}
