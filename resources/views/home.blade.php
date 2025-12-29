@extends('layouts.app')

@section('title', 'Verre Gule — Bar à Rouen | Cocktails, Happy Hour, Contact')
@section('meta_description', "Verre Gule à Rouen : bar-brasserie convivial, plats maison, bières, vins, cocktails, happy hour (17h – 20:30h). Contact pour infos ou privatisation.")
@section('canonical', url('/'))

@section('jsonld')
@php
  $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'BarOrPub',
    'name' => 'Verre Gule',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => '19 Rue Saint-Etienne des Tonneliers',
      'postalCode' => '76000',
      'addressLocality' => 'Rouen',
      'addressCountry' => 'FR',
    ],
    'telephone' => '+33983776901',
    'servesCuisine' => ['Bar', 'Brasserie'],
    'priceRange' => '€€',
    'url' => url('/'),
  ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endsection

@section('content')
@php
  $sellingPoints = [
    ['title' => 'Ambiance chill → festive', 'desc' => "Afterwork, puis la vibe monte au fil de la soirée.", 'tag' => 'Vibe'],
    ['title' => 'Carte bien fournie', 'desc' => 'Bières, vins, cocktails, shooters, softs.', 'tag' => 'Carte'],
    ['title' => 'Bar-brasserie', 'desc' => 'De quoi manger sans prise de tête.', 'tag' => 'Food'],
    ['title' => 'Groupes', 'desc' => 'Infos ou privatisation : on s’adapte.', 'tag' => 'Contact'],
  ];

  $dayNames = [1=>'Lundi',2=>'Mardi',3=>'Mercredi',4=>'Jeudi',5=>'Vendredi',6=>'Samedi',7=>'Dimanche'];

  $tz = 'Europe/Paris';

  $formatEventDate = function($e) use ($tz) {
    $starts = $e->starts_at ? \Illuminate\Support\Carbon::parse($e->starts_at)->timezone($tz) : null;
    $ends   = $e->ends_at   ? \Illuminate\Support\Carbon::parse($e->ends_at)->timezone($tz)   : null;

    if (!$starts) return 'Date à confirmer';

    $line = $starts->locale('fr')->translatedFormat('l d F • H\hi');
    if ($ends) $line .= ' — '.$ends->format('H\hi');

    return $line;
  };
@endphp

{{-- HERO --}}
<section class="relative overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute inset-0 bg-[radial-gradient(900px_500px_at_15%_10%,rgba(124,68,45,1),transparent_60%),radial-gradient(700px_450px_at_85%_20%,rgba(255,200,120,.14),transparent_55%),radial-gradient(700px_700px_at_50%_100%,rgba(255,255,255,.06),transparent_60%)]"></div>
    <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay"
      style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22400%22%3E%3Cfilter id=%22n%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%224%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22400%22 height=%22400%22 filter=%22url(%23n)%22 opacity=%220.35%22/%3E%3C/svg%3E');"></div>
  </div>

  <div class="relative mx-auto max-w-6xl px-4 pt-12 pb-10 md:pt-16 md:pb-16">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
      <div>
        <p class="inline-flex items-center gap-2 text-xs tracking-wide uppercase text-white/60">
          <span class="size-1.5 rounded-full bg-[rgba(124,68,45,1)] shadow-[0_0_24px_rgba(124,68,45,.6)]"></span>
          Bar • Brasserie • Cocktails • Happy hour • Rouen
        </p>

        <h1 class="mt-4 text-4xl md:text-5xl font-semibold tracking-tight text-white">
          Verre Gule
          <span class="block text-white/70 text-xl md:text-2xl font-normal mt-2">
            Bar-brasserie convivial à Rouen — plats maison & carte variée.
          </span>
        </h1>

        <p class="mt-5 text-white/70 leading-relaxed">
          Un spot où tu viens <span class="text-white/90 font-medium">chiller</span>, manger un truc,
          et profiter d’une ambiance détendue. Happy Hour <span class="text-white/90 font-medium">17h – 20:30h</span>.
        </p>

        <div class="mt-7 flex flex-wrap gap-3">
          <button type="button" data-open-menu
            class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold bg-white text-[#0B0B0F] hover:opacity-90 transition">
            Voir la carte
          </button>

          <a href="#infos"
            class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold border border-white/15 hover:bg-white/5 transition text-white">
            Infos & accès
          </a>
        </div>

        {{-- EVENTS (prochain + suivants) --}}
        @if(!empty($featuredEvent))
          <div class="mt-8">
            <div class="flex items-center justify-between gap-4">
              <p class="text-white/80 text-sm font-semibold">Événements</p>
              @if(Route::has('events.index'))
                <a href="{{ route('events.index') }}"
                   class="text-sm text-white/70 hover:text-white underline underline-offset-4">
                  Voir tous
                </a>
              @endif
            </div>

            {{-- Featured --}}
            <div class="mt-3 rounded-3xl border border-white/10 bg-white/5 overflow-hidden">
              @if($featuredEvent->image_src)
                <div class="relative h-44">
                  <img src="{{ $featuredEvent->image_src }}" alt="{{ $featuredEvent->title }}"
                       class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                  <div class="absolute inset-0 bg-gradient-to-t from-[#0B0B0F] via-[#0B0B0F]/30 to-transparent"></div>
                </div>
              @endif

              <div class="p-5">
                <p class="text-xs text-white/60">Prochain événement</p>
                <p class="mt-1 text-lg font-semibold">{{ $featuredEvent->title }}</p>
                <p class="mt-1 text-sm text-white/70">{{ $formatEventDate($featuredEvent) }}</p>

                @if($featuredEvent->description)
                  <p class="mt-3 text-sm text-white/70 leading-relaxed">
                    {{ $featuredEvent->description }}
                  </p>
                @endif

                <div class="mt-4 flex flex-wrap gap-2">
                  <button type="button" data-open-contact
                     class="px-4 py-2 rounded-lg text-sm font-semibold bg-[rgba(124,68,45,1)] hover:brightness-110 transition">
                    Réserver / Infos
                  </button>
                  <a href="#infos"
                     class="px-4 py-2 rounded-lg text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
                    Accès
                  </a>
                </div>
              </div>
            </div>

            {{-- Next events --}}
            @if(!empty($nextEvents) && $nextEvents->count())
              <div class="mt-4 grid sm:grid-cols-3 gap-3">
                @foreach($nextEvents as $e)
                  <div class="rounded-2xl border border-white/10 bg-white/5 overflow-hidden">
                    @if($e->image_url)
                      <div class="h-24">
                        <img src="{{ $e->image_url }}" alt="{{ $e->title }}"
                             class="w-full h-full object-cover" loading="lazy">
                      </div>
                    @endif
                    <div class="p-4">
                      <p class="font-semibold text-sm">{{ $e->title }}</p>
                      <p class="mt-1 text-xs text-white/70">{{ $formatEventDate($e) }}</p>
                      <div class="mt-3">
                        <button type="button" data-open-contact
                          class="w-full px-3 py-2 rounded-lg text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
                          Demander info
                        </button>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        @endif

        <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-3">
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
            <p class="text-white/60 text-xs">Adresse</p>
            <p class="text-sm mt-1">19 Rue Saint-Etienne des Tonneliers</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
            <p class="text-white/60 text-xs">Téléphone</p>
            <a class="text-sm mt-1 inline-block hover:underline" href="tel:+33983776901">09 83 77 69 01</a>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
            <p class="text-white/60 text-xs">Happy Hour</p>
            <p class="text-sm mt-1">17h – 20:30h</p>
          </div>
        </div>
      </div>

      <div class="relative">
        <div class="absolute -inset-6 blur-2xl bg-[radial-gradient(closest-side,rgba(124,68,45,1),transparent)]"></div>

        <div class="relative rounded-3xl border border-white/10 bg-white/5 overflow-hidden">
          <div class="p-6">
            <p class="text-white font-semibold text-lg">L’expérience Verre Gule</p>
            <p class="text-white/70 mt-1 text-sm">Simple, chaleureux, efficace — et ça monte en énergie le soir.</p>

            <div class="mt-6 grid sm:grid-cols-2 gap-3">
              @foreach($sellingPoints as $item)
                <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-4">
                  <div class="flex items-start justify-between gap-4">
                    <p class="font-semibold">{{ $item['title'] }}</p>
                    <span class="text-[11px] px-2 py-1 rounded-full bg-white/5 border border-white/10 text-white/70">
                      {{ $item['tag'] }}
                    </span>
                  </div>
                  <p class="text-sm text-white/70 mt-2">{{ $item['desc'] }}</p>
                </div>
              @endforeach
            </div>

            <div class="mt-6 flex flex-wrap gap-2 text-xs text-white/60">
              <span class="px-3 py-1.5 rounded-full border border-white/10 bg-white/5">Bien pour danser</span>
              <span class="px-3 py-1.5 rounded-full border border-white/10 bg-white/5">Restauration</span>
              <span class="px-3 py-1.5 rounded-full border border-white/10 bg-white/5">Happy hour 17h – 20:30h</span>
            </div>
          </div>

          <div class="px-6 pb-6">
            <button type="button" data-open-contact
              class="w-full inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
              Une question ? Contact
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- LE BAR --}}
<section id="le-bar" class="mx-auto max-w-6xl px-4 py-14">
  <div class="grid lg:grid-cols-12 gap-8 items-start">
    <div class="lg:col-span-5">
      <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">Un bar qui te met bien</h2>
      <p class="mt-3 text-white/70 leading-relaxed">
        Bar-brasserie convivial : bières, vins, cocktails… et de quoi manger sur place.
      </p>
    </div>

    <div class="lg:col-span-7 grid sm:grid-cols-2 gap-4">
      @foreach ([
        ['title' => 'Convivial', 'desc' => 'Entre amis, collègues, famille.'],
        ['title' => 'Carte variée', 'desc' => 'Pressions, cocktails, shooters, softs.'],
        ['title' => 'Bar-brasserie', 'desc' => 'De quoi manger sur place.'],
        ['title' => 'Happy Hour', 'desc' => 'Tous les jours d’ouverture : 17h – 20:30h.'],
      ] as $card)
        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
          <p class="font-semibold">{{ $card['title'] }}</p>
          <p class="mt-2 text-sm text-white/70">{{ $card['desc'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CARTE --}}
<section id="carte" class="mx-auto max-w-6xl px-4 pb-14">
  <div class="rounded-3xl border border-white/10 bg-white/5 overflow-hidden">
    <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div>
        <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">La carte</h2>
        <p class="mt-2 text-white/70">La carte complète est disponible en un clic.</p>
      </div>
      <button type="button" data-open-menu
        class="px-4 py-2 rounded-lg bg-white text-[#0B0B0F] hover:opacity-90 transition text-sm font-semibold">
        Voir la carte complète
      </button>
    </div>
  </div>
</section>

{{-- HAPPY HOUR --}}
<section id="happyhour" class="mx-auto max-w-6xl px-4 pb-14">
  <div class="rounded-3xl border border-white/10 bg-[radial-gradient(900px_500px_at_20%_0%,rgba(124,68,45,1),transparent_60%)] bg-white/5 p-6 md:p-8">
    <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">Happy Hour</h2>
    <p class="mt-2 text-white/70">Tous les jours d’ouverture : <span class="text-white/90 font-medium">17h – 20:30h</span>.</p>
  </div>
</section>

{{-- INFOS --}}
<section id="infos" class="mx-auto max-w-6xl px-4 pb-16">
  <div class="rounded-3xl border border-white/10 bg-white/5 p-6 md:p-8">
    <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">Infos & accès</h2>

    <div class="mt-6 grid md:grid-cols-4 gap-4">
      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="text-white/60 text-xs">Adresse</p>
        <p class="mt-2 text-sm text-white/90">19 Rue Saint-Etienne des Tonneliers, 76000 Rouen</p>
      </div>

      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="text-white/60 text-xs">Téléphone</p>
        <a class="mt-2 inline-block text-sm text-white/90 hover:underline" href="tel:+33983776901">
          09 83 77 69 01
        </a>
      </div>

      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="text-white/60 text-xs">Horaires</p>
        <div class="mt-2 space-y-1 text-sm text-white/80">
          @forelse($hours as $h)
            <div class="flex justify-between">
              <span>{{ $dayNames[$h->day_of_week] ?? $h->day_of_week }}</span>

              @if($h->is_closed)
                <span class="text-white/60">Fermé</span>
              @else
                <span class="text-white/85">
                  {{ \Illuminate\Support\Carbon::parse($h->opens_at)->format('H:i') }}
                  –
                  {{ \Illuminate\Support\Carbon::parse($h->closes_at)->format('H:i') }}
                </span>
              @endif
            </div>
          @empty
            <p class="text-sm text-white/70">Horaires à définir.</p>
          @endforelse
        </div>
        <p class="mt-3 text-xs text-white/50">Happy Hour : <span class="text-white/70">17h – 20:30h</span></p>
      </div>

      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="text-white/60 text-xs">Accès (rapide)</p>
        <ul class="mt-2 space-y-2 text-sm text-white/80">
          <li>🚶 ≈ 2–4 min : Place du Vieux-Marché (Église Sainte-Jeanne-d’Arc)</li>
          <li>🚇 Métro/Tram : Palais de Justice ou Théâtre des Arts</li>
          <li>🚌 TEOR : centre / Vieux-Marché</li>
          <li>🚗 Parking : Vieux-Marché, Palais de Justice, Cathédrale / Square des Arts</li>
        </ul>
      </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
      <a target="_blank" rel="noopener"
         href="https://www.google.com/maps/search/?api=1&query=Verre%20Gule%2019%20Rue%20Saint-Etienne%20des%20Tonneliers%2076000%20Rouen"
         class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
        Itinéraire (Google Maps)
      </a>

      <button type="button" data-open-contact
         class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold bg-[rgba(124,68,45,1)] hover:brightness-110 transition">
        Contact
      </button>
    </div>
  </div>
</section>

{{-- MODAL CARTE (DB) --}}
<div class="fixed inset-0 z-[70] hidden" data-menu-modal aria-hidden="true">
  <div class="absolute inset-0 bg-black/70" data-close-menu></div>

  <div class="relative mx-auto max-w-3xl px-4 py-8">
    <div class="rounded-3xl border border-white/10 bg-[#0B0B0F] shadow-2xl overflow-hidden">
      <div class="p-6 border-b border-white/10 flex items-start justify-between gap-4">
        <div>
          <p class="text-white font-semibold text-lg">La carte</p>
          <p class="text-white/70 text-sm mt-1">Happy Hour : 17h – 20:30h</p>
        </div>
        <button type="button"
          class="size-10 rounded-xl border border-white/10 hover:bg-white/5 transition grid place-items-center"
          aria-label="Fermer" data-close-menu>✕</button>
      </div>

      <div class="p-6 max-h-[70vh] overflow-auto space-y-6">
        @forelse($menuCategories as $cat)
          <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
            <h3 class="text-lg font-semibold">{{ $cat->name }}</h3>

            <ul class="mt-4 space-y-2">
              @foreach($cat->items as $i)
                <li class="flex items-start justify-between gap-4">
                  <p class="text-white/90 text-sm font-medium">{{ $i->name }}</p>
                  <p class="text-sm text-white/70 whitespace-nowrap">{{ $i->price_text }}</p>
                </li>
              @endforeach
            </ul>
          </div>
        @empty
          <p class="text-white/70 text-sm">La carte arrive bientôt.</p>
        @endforelse

        <p class="text-xs text-white/50">* Carte susceptible d’évoluer selon les produits et la saison.</p>
      </div>
    </div>
  </div>
</div>

{{-- MODAL CONTACT (mail) --}}
<div class="fixed inset-0 z-[80] hidden" data-contact-modal aria-hidden="true">
  <div class="absolute inset-0 bg-black/70" data-close-contact></div>

  <div class="relative mx-auto max-w-xl px-4 py-10">
    <div class="rounded-3xl border border-white/10 bg-[#0B0B0F] shadow-2xl overflow-hidden">
      <div class="p-6 border-b border-white/10">
        <div class="flex items-start justify-between gap-4">
          <div>
            <p class="text-white font-semibold text-lg">Contact</p>
            <p class="text-white/70 text-sm mt-1">Infos ou privatisation : réponse sous 24h.</p>
          </div>
          <button type="button"
            class="size-10 rounded-xl border border-white/10 hover:bg-white/5 transition grid place-items-center"
            aria-label="Fermer" data-close-contact>✕</button>
        </div>
      </div>

      <form class="p-6 space-y-4" action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="text-xs text-white/60">Nom</label>
            <input name="name" required value="{{ old('name') }}"
              class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
              placeholder="Mehdi">
          </div>
          <div>
            <label class="text-xs text-white/60">Téléphone</label>
            <input name="phone" value="{{ old('phone') }}"
              class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
              placeholder="06…">
          </div>
        </div>

        <div>
  <label class="text-xs text-white/60">Email</label>
  <input type="email" name="email" required value="{{ old('email') }}"
    class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
    placeholder="email@exemple.com">
</div>


        <div>
          <label class="text-xs text-white/60">Sujet</label>
          <select name="subject" required
            class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30">
            <option value="information" @selected(old('subject')==='information')>Information</option>
            <option value="privatisation" @selected(old('subject')==='privatisation')>Privatisation</option>
          </select>
        </div>

        <div>
          <label class="text-xs text-white/60">Message</label>
          <textarea name="message" rows="4" required
            class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
            placeholder="Ta question ou (date + nombre) si privatisation">{{ old('message') }}</textarea>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <button type="button" data-close-contact
            class="sm:flex-1 px-5 py-3 rounded-xl text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
            Annuler
          </button>

          <a href="tel:+33983776901"
            class="sm:flex-1 px-5 py-3 rounded-xl text-sm font-semibold bg-white text-[#0B0B0F] hover:opacity-90 transition text-center">
            Appeler
          </a>

          <button type="submit"
            class="sm:flex-1 px-5 py-3 rounded-xl text-sm font-semibold bg-[rgba(124,68,45,1)] hover:brightness-110 transition">
            Envoyer
          </button>
        </div>

        <p class="text-xs text-white/50">
          Aucun engagement. Réponse sous <span class="text-white/70">24h maximum</span>.
        </p>
      </form>
    </div>
  </div>
</div>

@if(session('contact_success'))
  <div
    data-contact-success
    class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[100]
           max-w-md w-[92%]
           rounded-2xl border border-emerald-500/30
           bg-emerald-500/15
           text-emerald-200 px-5 py-4 shadow-2xl backdrop-blur">

    <p class="text-sm font-semibold">
      Merci pour ton message 🍸
    </p>

    <p class="mt-1 text-sm leading-relaxed">
      Ton message a bien été envoyé à l’équipe <strong>Verre Gule</strong>.
      Nous te répondrons <strong>en moins de 24h</strong>, souvent bien avant 😉
    </p>

    <p class="mt-2 text-xs text-emerald-100/70">
      En attendant, passe boire un verre ou appelle-nous si c’est urgent.
    </p>
  </div>

  <script>
    setTimeout(() => {
      const el = document.querySelector('[data-contact-success]');
      if (el) el.remove();
    }, 6000);
  </script>
@endif
@endsection

@push('scripts')
<script>
(function () {
  // Mobile menu
  const btn = document.querySelector('[data-toggle-mobile]');
  const panel = document.querySelector('[data-mobile-panel]');
  const closeLinks = document.querySelectorAll('[data-close-mobile]');

  if (btn && panel) {
    btn.addEventListener('click', () => panel.classList.toggle('hidden'));
    closeLinks.forEach(a => a.addEventListener('click', () => panel.classList.add('hidden')));
  }

  const lock = () => document.documentElement.classList.add('overflow-hidden');
  const unlock = () => document.documentElement.classList.remove('overflow-hidden');

  // Menu modal
  const menuModal = document.querySelector('[data-menu-modal]');
  const openMenuBtns = document.querySelectorAll('[data-open-menu]');
  const closeMenuTargets = document.querySelectorAll('[data-close-menu]');

  const openMenu = () => {
    if (!menuModal) return;
    menuModal.classList.remove('hidden');
    menuModal.setAttribute('aria-hidden','false');
    lock();
  };

  const closeMenu = () => {
    if (!menuModal) return;
    menuModal.classList.add('hidden');
    menuModal.setAttribute('aria-hidden','true');
    unlock();
  };

  openMenuBtns.forEach(b => b.addEventListener('click', openMenu));
  closeMenuTargets.forEach(b => b.addEventListener('click', closeMenu));

  // Contact modal
  const contactModal = document.querySelector('[data-contact-modal]');
  const openContactBtns = document.querySelectorAll('[data-open-contact]');
  const closeContactTargets = document.querySelectorAll('[data-close-contact]');

  const openContact = () => {
    if (!contactModal) return;
    contactModal.classList.remove('hidden');
    contactModal.setAttribute('aria-hidden','false');
    lock();
  };

  const closeContact = () => {
    if (!contactModal) return;
    contactModal.classList.add('hidden');
    contactModal.setAttribute('aria-hidden','true');
    unlock();
  };

  openContactBtns.forEach(b => b.addEventListener('click', openContact));
  closeContactTargets.forEach(b => b.addEventListener('click', closeContact));

  // ESC
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    if (contactModal && !contactModal.classList.contains('hidden')) return closeContact();
    if (menuModal && !menuModal.classList.contains('hidden')) return closeMenu();
  });
})();
</script>
@endpush
