<header class="sticky top-0 z-50 backdrop-blur supports-[backdrop-filter]:bg-black/30 bg-black/40 border-b border-white/10">
  <div class="mx-auto max-w-6xl px-4 py-3 flex items-center justify-between">
    <a href="{{ route('home') }}" class="group inline-flex items-center gap-3">
      <span class="relative grid place-items-center w-10 h-10 rounded-xl bg-white/5 border border-white/10 overflow-hidden">
        <span class="absolute inset-0 bg-gradient-to-br from-[#ff2a2a]/30 via-transparent to-[#ff7a18]/20"></span>
        <span class="relative font-black tracking-tight">VG</span>
      </span>
      <div class="leading-tight">
        <div class="font-semibold tracking-tight group-hover:text-white/90">Verre Gule</div>
        <div class="text-xs text-white/60 -mt-0.5">Bar • Rouen</div>
      </div>
    </a>

    <nav class="hidden md:flex items-center gap-6 text-sm">
      <a href="#ambiance" class="text-white/70 hover:text-white transition">Ambiance</a>
      <a href="#carte" class="text-white/70 hover:text-white transition">Carte</a>
      <a href="#events" class="text-white/70 hover:text-white transition">Événements</a>
      <a href="#privatisation" class="text-white/70 hover:text-white transition">Privatisation</a>
      <a href="#contact" class="text-white/70 hover:text-white transition">Contact</a>
    </nav>

    <div class="flex items-center gap-2">
      <a
        href="#privatisation"
        class="hidden sm:inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold
               bg-white text-black hover:bg-white/90 transition"
      >
        Privatiser le bar
      </a>

      {{-- Mobile menu button (tu peux le brancher plus tard) --}}
      <button
        type="button"
        class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition"
      >
        <span class="sr-only">Menu</span>
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
          <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>
  </div>
</header>
