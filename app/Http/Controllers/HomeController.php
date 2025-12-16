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

        $links = [
            ['label' => 'Le bar', 'href' => '#le-bar'],
            ['label' => 'Carte', 'href' => '#carte'],
            ['label' => 'Happy Hour', 'href' => '#happyhour'],
            ['label' => 'Infos', 'href' => '#infos'],
        ];

        $hours = OpeningHour::orderBy('day_of_week')->get();

        $menuCategories = MenuCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->with(['items' => function ($q) {
                $q->where('is_active', true)->orderBy('sort_order')->orderBy('id');
            }])
            ->get();

        // ✅ Events : uniquement actifs + à venir (ou sans date)
        $eventsQuery = Event::query()
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('starts_at')
                  ->orWhere('starts_at', '>=', now());
            })
            ->orderByRaw('starts_at is null, starts_at asc');

        $featuredEvent = (clone $eventsQuery)->first();      // le prochain
        $nextEvents    = (clone $eventsQuery)->skip(1)->take(3)->get(); // 3 suivants

        return view('home', compact(
            'status','links','hours','menuCategories','featuredEvent','nextEvents'
        ));
    }
}
