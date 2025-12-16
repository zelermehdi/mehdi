@extends('layouts.app')

@section('title', 'Événements — Verre Gule')
@section('meta_description', "Tous les événements du Verre Gule à Rouen : concerts, soirées, etc.")

@section('content')
@php $tz='Europe/Paris'; @endphp

<section class="mx-auto max-w-6xl px-4 py-12">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h1 class="text-3xl font-semibold tracking-tight">Événements</h1>
      <p class="mt-2 text-white/70">Concerts, soirées, animations…</p>
    </div>

    <a href="{{ route('home') }}"
       class="px-4 py-2 rounded-lg text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
      Retour accueil
    </a>
  </div>

  <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($events as $e)
      @php
        $starts = $e->starts_at?->timezone($tz);
        $ends   = $e->ends_at?->timezone($tz);
        $line = $starts ? $starts->locale('fr')->translatedFormat('l d F • H\hi') : 'Date à confirmer';
        if ($starts && $ends) $line .= ' — '.$ends->format('H\hi');
      @endphp

      <div class="rounded-3xl border border-white/10 bg-white/5 overflow-hidden">
        @if($e->image_src)
          <div class="h-40">
            <img src="{{ $e->image_src }}" alt="{{ $e->title }}"
                 class="w-full h-full object-cover" loading="lazy">
          </div>
        @endif

        <div class="p-5">
          <p class="text-lg font-semibold">{{ $e->title }}</p>
          <p class="mt-1 text-sm text-white/70">{{ $line }}</p>

          @if($e->description)
            <p class="mt-3 text-sm text-white/70 line-clamp-4">{{ $e->description }}</p>
          @endif

          <div class="mt-4">
            <button type="button" data-open-contact
              class="w-full px-4 py-2 rounded-lg text-sm font-semibold bg-[#F53003] hover:brightness-110 transition">
              Réserver / Infos
            </button>
          </div>
        </div>
      </div>
    @empty
      <p class="text-white/70">Aucun événement pour le moment.</p>
    @endforelse
  </div>

  <div class="mt-8">
    {{ $events->links() }}
  </div>
</section>
@endsection
