<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MenuCategory;
use App\Models\OpeningHour;
use App\Support\BarStatus;

class HomeController extends Controller
{
    public function index()
    {
        $status = BarStatus::compute('Europe/Paris');

        $hours = OpeningHour::orderBy('day_of_week')->get();

        $menuCategories = MenuCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->with(['items' => function ($q) {
                $q->where('is_active', true)->orderBy('sort_order');
            }])
            ->get();

        $event = Event::query()
            ->where('is_active', true)
            ->orderByRaw('starts_at is null, starts_at asc')
            ->first();

        return view('home', compact('status','hours','menuCategories','event'));
    }
}
