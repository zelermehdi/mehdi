@php
  use Illuminate\Support\Carbon;

  Carbon::setLocale('fr');

  $links = [
    ['label' => 'Le bar', 'href' => '#le-bar'],
    ['label' => 'Carte', 'href' => '#carte'],
    ['label' => 'Happy Hour', 'href' => '#happyhour'],
    ['label' => 'Infos', 'href' => '#infos'],
  ];

  $tz = 'Europe/Paris';
  $now = Carbon::now($tz);

  // ISO: 1=lundi ... 7=dimanche
  $hours = [
    1 => null, // Lundi fermé
    2 => ['open' => '16:00', 'close' => '02:00'],
    3 => ['open' => '16:00', 'close' => '02:00'],
    4 => ['open' => '16:00', 'close' => '02:00'],
    5 => ['open' => '16:00', 'close' => '02:00'],
    6 => ['open' => '16:00', 'close' => '02:00'],
    7 => ['open' => '15:00', 'close' => '23:30'],
  ];

  $today = $now->dayOfWeekIso;
  $yesterday = $today === 1 ? 7 : $today - 1;

  $isBetween = fn(Carbon $t, Carbon $start, Carbon $end)
    => $t->greaterThanOrEqualTo($start) && $t->lessThan($end);

  $statusForToday = function () use ($hours, $now, $tz, $today, $isBetween) {
    $h = $hours[$today] ?? null;
    if (!$h) return [false, null];

    $open = Carbon::parse($now->toDateString().' '.$h['open'], $tz);
    $close = Carbon::parse($now->toDateString().' '.$h['close'], $tz);
    if ($close->lessThanOrEqualTo($open)) $close->addDay();

    return [$isBetween($now, $open, $close), $close];
  };

  [$openToday, $closeToday] = $statusForToday();

  // Gestion ouverture après minuit (ex: ferme 02:00 -> c'est encore ouvert après minuit)
  $openFromYesterday = false;
  $closeFromYesterday = null;

  $hY = $hours[$yesterday] ?? null;
  if ($hY) {
    $openY  = Carbon::parse($now->copy()->subDay()->toDateString().' '.$hY['open'], $tz);
    $closeY = Carbon::parse($now->copy()->subDay()->toDateString().' '.$hY['close'], $tz);
    if ($closeY->lessThanOrEqualTo($openY)) $closeY->addDay();

    if ($isBetween($now, $openY, $closeY)) {
      $openFromYesterday = true;
      $closeFromYesterday = $closeY;
    }
  }

  $isOpen = $openToday || $openFromYesterday;
  $closesAt = $openFromYesterday ? $closeFromYesterday : $closeToday;

  // Prochaine ouverture (FR)
  $nextOpenText = null;
  if (!$isOpen) {
    for ($i=0; $i<8; $i++) {
      $d = (($today - 1 + $i) % 7) + 1;
      if (!empty($hours[$d])) {
        $date = $now->copy()->addDays($i)->startOfDay();
        $next = Carbon::parse($date->toDateString().' '.$hours[$d]['open'], $tz);

        $nextOpenText = ($i === 0)
          ? 'Ouvre à '.$next->format('H\hi')
          : 'Ouvre '.mb_strtolower($next->translatedFormat('l')).' à '.$next->format('H\hi');
        break;
      }
    }
  }

  $hhStart = Carbon::parse($now->toDateString().' 18:00', $tz);
  $hhEnd   = Carbon::parse($now->toDateString().' 22:00', $tz);
  $isHappyHour = $isOpen && $isBetween($now, $hhStart, $hhEnd);

  $statusLabel = $isOpen
    ? ('Ouvert • jusqu’à '.$closesAt?->format('H\hi'))
    : ('Fermé • '.$nextOpenText);
@endphp

<header class="sticky top-0 z-50 backdrop-blur bg-[#0B0B0F]/70 border-b border-white/10">
  <nav class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between gap-3">
    <a href="{{ route('home') }}" class="group flex items-center gap-3">
      <span class="relative grid place-items-center size-10 rounded-xl bg-white/5 border border-white/10">
        <span class="size-2.5 rounded-full bg-[#F53003] shadow-[0_0_40px_rgba(245,48,3,.6)]"></span>
      </span>
      <span class="leading-tight">
        <span class="block text-white font-semibold tracking-tight text-lg">Verre Gule</span>
        <span class="block text-white/60 text-xs -mt-0.5">Bar • Rouen</span>
      </span>
    </a>

    {{-- Badge ouvert/fermé --}}
    <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/10 bg-white/5 text-xs">
      <span class="inline-block size-2 rounded-full {{ $isOpen ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
      <span class="text-white/85">{{ $statusLabel }}</span>
      <span class="text-white/35">•</span>
      <span class="text-white/70">Happy Hour 18h–22h</span>
      @if($isHappyHour)
        <span class="ml-1 text-[11px] px-2 py-0.5 rounded-full bg-emerald-400/15 text-emerald-200 border border-emerald-400/20">
          En cours
        </span>
      @endif
    </div>

    <div class="hidden md:flex items-center gap-1">
      @foreach($links as $l)
        <a href="{{ $l['href'] }}"
           class="px-3 py-2 rounded-lg text-sm text-white/80 hover:text-white hover:bg-white/5 transition">
          {{ $l['label'] }}
        </a>
      @endforeach
    </div>

    <div class="flex items-center gap-2">
      <a href="tel:+33983776901"
         class="hidden sm:inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm border border-white/10 hover:bg-white/5 transition text-white/85">
        <span class="inline-block size-2 rounded-full {{ $isOpen ? 'bg-emerald-400' : 'bg-white/30' }}"></span>
        Appeler
      </a>

      {{-- UN SEUL CTA --}}
      <button type="button"
              data-open-contact
              class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-[#F53003] hover:brightness-110 transition shadow-[0_0_40px_rgba(245,48,3,.25)]">
        Contact
        <span aria-hidden="true">→</span>
      </button>

      <button type="button"
              class="md:hidden inline-flex items-center justify-center size-10 rounded-lg border border-white/10 hover:bg-white/5 transition"
              aria-label="Ouvrir le menu"
              data-toggle-mobile>
        <span class="w-5 h-0.5 bg-white block mb-1"></span>
        <span class="w-5 h-0.5 bg-white block mb-1"></span>
        <span class="w-5 h-0.5 bg-white block"></span>
      </button>
    </div>
  </nav>

  <div class="md:hidden hidden border-t border-white/10" data-mobile-panel>
    <div class="mx-auto max-w-6xl px-4 py-3 flex flex-col gap-1">
      <div class="mb-2 inline-flex items-center gap-2 px-3 py-2 rounded-xl border border-white/10 bg-white/5 text-xs">
        <span class="inline-block size-2 rounded-full {{ $isOpen ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
        <span class="text-white/85">{{ $statusLabel }}</span>
        <span class="text-white/35">•</span>
        <span class="text-white/70">Happy Hour 18h–22h</span>
        @if($isHappyHour)
          <span class="ml-1 text-[11px] px-2 py-0.5 rounded-full bg-emerald-400/15 text-emerald-200 border border-emerald-400/20">
            En cours
          </span>
        @endif
      </div>

      @foreach($links as $l)
        <a href="{{ $l['href'] }}"
           class="px-3 py-2 rounded-lg text-sm text-white/85 hover:text-white hover:bg-white/5 transition"
           data-close-mobile>
          {{ $l['label'] }}
        </a>
      @endforeach

      <div class="pt-2 flex gap-2">
        <a href="tel:+33983776901"
           class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm border border-white/10 hover:bg-white/5 transition text-white/85">
          Appeler
        </a>
        <button type="button" data-open-contact
                class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm font-semibold bg-[#F53003] hover:brightness-110 transition">
          Contact
        </button>
      </div>
    </div>
  </div>
</header>
