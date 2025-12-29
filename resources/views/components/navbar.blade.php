@props([
  'status' => null,
  'links' => [],
])

@php
  $isOpen = $status['isOpen'] ?? false;
  $isHappyHour = $status['isHappyHour'] ?? false;
  $statusLabel = $status['statusLabel'] ?? '—';
@endphp

<header class="sticky top-0 z-50 backdrop-blur bg-[#0B0B0F]/70 border-b border-white/10">
  <nav class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between gap-3">
    <a href="{{ route('home') }}" class="group flex items-center gap-3">
      <span class="relative grid place-items-center size-10 rounded-xl bg-white/5 border border-white/10">
        <span class="size-2.5 rounded-full bg-[rgb(97,45,16)] shadow-[0_0_40px_rgba(97,45,16,.6)]"></span>
      </span>
      <span class="leading-tight">
        <span class="block text-white font-semibold tracking-tight text-lg">Verre Gule</span>
        <span class="block text-white/60 text-xs -mt-0.5">Bar • Rouen</span>
      </span>
    </a>

    {{-- Badge ouvert/fermé --}}
    <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/10 bg-white/5 text-xs">
      <span class="inline-block size-2 rounded-full
        {{ $isOpen ? 'bg-[rgb(97,45,16)]' : 'bg-[rgba(97,45,16,.35)]' }}">
      </span>
      <span class="text-white/85">{{ $statusLabel }}</span>
      <span class="text-white/35">•</span>
      <span class="text-white/70">Happy Hour 17h – 20:30h</span>

      @if($isHappyHour)
        <span class="ml-1 text-[11px] px-2 py-0.5 rounded-full
          bg-[rgba(97,45,16,.15)]
          text-[rgb(97,45,16)]
          border border-[rgba(97,45,16,.25)]">
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
        <span class="inline-block size-2 rounded-full
          {{ $isOpen ? 'bg-[rgb(97,45,16)]' : 'bg-white/30' }}">
        </span>
        Appeler
      </a>

      {{-- CTA --}}
      <button type="button"
              data-open-contact
              class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold
                     bg-[rgb(97,45,16)]
                     hover:brightness-110 transition
                     shadow-[0_0_40px_rgba(97,45,16,.35)]">
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

  {{-- Mobile panel --}}
  <div class="md:hidden hidden border-t border-white/10" data-mobile-panel>
    <div class="mx-auto max-w-6xl px-4 py-3 flex flex-col gap-1">
      <div class="mb-2 inline-flex items-center gap-2 px-3 py-2 rounded-xl border border-white/10 bg-white/5 text-xs">
        <span class="inline-block size-2 rounded-full
          {{ $isOpen ? 'bg-[rgb(97,45,16)]' : 'bg-[rgba(97,45,16,.35)]' }}">
        </span>
        <span class="text-white/85">{{ $statusLabel }}</span>
        <span class="text-white/35">•</span>
        <span class="text-white/70">Happy Hour 17h – 20:30h</span>

        @if($isHappyHour)
          <span class="ml-1 text-[11px] px-2 py-0.5 rounded-full
            bg-[rgba(97,45,16,.15)]
            text-[rgb(97,45,16)]
            border border-[rgba(97,45,16,.25)]">
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
                class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm font-semibold
                       bg-[rgb(97,45,16)] hover:brightness-110 transition">
          Contact
        </button>
      </div>
    </div>
  </div>
</header>
