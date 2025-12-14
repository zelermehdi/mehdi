@extends('layouts.app')

@section('title', 'Verre Gule — Bar à Rouen')

@section('content')
  {{-- HERO --}}
  <section class="relative overflow-hidden">
    <div class="absolute inset-0">
      <div class="absolute -top-32 -left-24 w-[38rem] h-[38rem] rounded-full bg-[#ff2a2a]/20 blur-3xl"></div>
      <div class="absolute -bottom-40 -right-28 w-[44rem] h-[44rem] rounded-full bg-[#ff7a18]/15 blur-3xl"></div>
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.08),transparent_40%),radial-gradient(circle_at_70%_30%,rgba(255,122,24,0.12),transparent_45%),radial-gradient(circle_at_30%_85%,rgba(255,42,42,0.14),transparent_40%)]"></div>
    </div>

    <div class="relative mx-auto max-w-6xl px-4 pt-14 pb-12 md:pt-20 md:pb-16">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div>
          <p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide text-white/70 border border-white/10 bg-white/5 rounded-full px-3 py-1">
            <span class="w-1.5 h-1.5 rounded-full bg-[#ff2a2a]"></span>
            Bar à Rouen • Ambiance chaleureuse
          </p>

          <h1 class="mt-5 text-4xl md:text-6xl font-extrabold tracking-tight">
            Verre Gule
            <span class="block text-white/70 font-semibold text-2xl md:text-3xl mt-2">
              Cocktails • Bières • Soirées
            </span>
          </h1>

          <p class="mt-5 text-white/70 max-w-xl leading-relaxed">
            Une vibe nocturne, une lumière chaude, des verres qui claquent.
            Un lieu parfait pour se retrouver — et surtout pour organiser une soirée privée.
          </p>

          <div class="mt-8 flex flex-col sm:flex-row gap-3">
            <a href="#privatisation"
               class="inline-flex items-center justify-center rounded-2xl px-6 py-3 font-semibold
                      bg-white text-black hover:bg-white/90 transition">
              Demander une privatisation
            </a>

            <a href="#carte"
               class="inline-flex items-center justify-center rounded-2xl px-6 py-3 font-semibold
                      bg-white/5 border border-white/10 hover:bg-white/10 transition">
              Découvrir le lieu
            </a>
          </div>

          <div class="mt-8 grid grid-cols-3 gap-3 max-w-md">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
              <div class="text-2xl font-bold">🍸</div>
              <div class="mt-2 text-sm font-semibold">Cocktails</div>
              <div class="text-xs text-white/60">Classiques & créations</div>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
              <div class="text-2xl font-bold">🍺</div>
              <div class="mt-2 text-sm font-semibold">Bières</div>
              <div class="text-xs text-white/60">Pression & bouteille</div>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
              <div class="text-2xl font-bold">🎶</div>
              <div class="mt-2 text-sm font-semibold">Soirées</div>
              <div class="text-xs text-white/60">DJ & events</div>
            </div>
          </div>
        </div>

        {{-- VISUEL --}}
        <div class="relative">
          <div class="rounded-[2rem] border border-white/10 bg-gradient-to-b from-white/10 to-white/5 p-1 shadow-2xl">
            <div class="rounded-[1.8rem] bg-black/40 border border-white/10 overflow-hidden">
              <div class="p-6 md:p-8">
                <div class="flex items-center justify-between">
                  <div class="text-sm font-semibold text-white/80">Ambiance</div>
                  <div class="text-xs text-white/50">Rouen • Centre</div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-4">
                  <div class="aspect-[4/3] rounded-2xl bg-white/5 border border-white/10 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#ff2a2a]/20 via-transparent to-[#ff7a18]/10"></div>
                    <div class="absolute bottom-3 left-3 text-xs text-white/70">Lumière chaude</div>
                  </div>
                  <div class="aspect-[4/3] rounded-2xl bg-white/5 border border-white/10 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#ff7a18]/20 via-transparent to-[#ff2a2a]/10"></div>
                    <div class="absolute bottom-3 left-3 text-xs text-white/70">Bar & comptoir</div>
                  </div>
                  <div class="col-span-2 aspect-[16/8] rounded-2xl bg-white/5 border border-white/10 overflow-hidden relative">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_30%,rgba(255,42,42,0.22),transparent_55%),radial-gradient(circle_at_80%_40%,rgba(255,122,24,0.18),transparent_55%)]"></div>
                    <div class="absolute bottom-3 left-3 text-xs text-white/70">La vibe du soir</div>
                  </div>
                </div>

                <div class="mt-6 flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                  <div>
                    <div class="text-sm font-semibold">Privatisation</div>
                    <div class="text-xs text-white/60">Anniversaire • Pro • Soirée privée</div>
                  </div>
                  <a href="#privatisation" class="text-sm font-semibold underline underline-offset-4 text-white/80 hover:text-white">
                    Voir
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="absolute -z-10 -inset-8 bg-gradient-to-br from-[#ff2a2a]/10 to-[#ff7a18]/10 blur-3xl"></div>
        </div>
      </div>
    </div>
  </section>

  {{-- AMBIANCE --}}
  <section id="ambiance" class="border-t border-white/10 bg-black/20">
    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
      <div class="flex items-end justify-between gap-6">
        <div>
          <h2 class="text-2xl md:text-3xl font-bold tracking-tight">Une ambiance signature</h2>
          <p class="mt-2 text-white/70 max-w-2xl">
            Sombre, chic, chaleureux — avec des touches rouge/orange qui rappellent les néons et les cocktails.
          </p>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Vibe</div>
          <div class="mt-2 text-lg font-semibold">Nocturne & cosy</div>
          <p class="mt-2 text-sm text-white/70">
            Un lieu qui donne envie de rester, discuter, et lancer une soirée.
          </p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Son</div>
          <div class="mt-2 text-lg font-semibold">Groove & énergie</div>
          <p class="mt-2 text-sm text-white/70">
            Des playlists et des événements qui montent en intensité au fil de la nuit.
          </p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Service</div>
          <div class="mt-2 text-lg font-semibold">Simple, efficace</div>
          <p class="mt-2 text-sm text-white/70">
            Cocktails propres, bières fraîches, et une équipe à l’écoute.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- CARTE --}}
  <section id="carte" class="border-t border-white/10">
    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
      <h2 class="text-2xl md:text-3xl font-bold tracking-tight">La carte</h2>
      <p class="mt-2 text-white/70 max-w-2xl">
        Mets ici tes vraies boissons plus tard. Pour l’instant on met une structure stylée.
      </p>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Cocktails</h3>
            <span class="text-xs text-white/60">Signature</span>
          </div>
          <ul class="mt-4 space-y-3 text-sm">
            <li class="flex items-center justify-between">
              <span class="text-white/80">Neon Spritz</span>
              <span class="text-white/60">—</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/80">Rouen Mule</span>
              <span class="text-white/60">—</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/80">Verre Gule Sour</span>
              <span class="text-white/60">—</span>
            </li>
          </ul>
        </div>

        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Bières</h3>
            <span class="text-xs text-white/60">Pression & bouteille</span>
          </div>
          <ul class="mt-4 space-y-3 text-sm">
            <li class="flex items-center justify-between">
              <span class="text-white/80">IPA</span>
              <span class="text-white/60">—</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/80">Blanche</span>
              <span class="text-white/60">—</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/80">Ambrée</span>
              <span class="text-white/60">—</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  {{-- EVENTS --}}
  <section id="events" class="border-t border-white/10 bg-black/20">
    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
      <h2 class="text-2xl md:text-3xl font-bold tracking-tight">Événements</h2>
      <p class="mt-2 text-white/70 max-w-2xl">
        Ajoute tes soirées réelles plus tard (DJ set, thèmes, happy hour…).
      </p>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-xs text-white/60">Chaque semaine</div>
          <div class="mt-2 font-semibold">DJ / Playlist</div>
          <p class="mt-2 text-sm text-white/70">Une montée progressive pour garder une vibe clean.</p>
        </div>
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-xs text-white/60">À programmer</div>
          <div class="mt-2 font-semibold">Afterwork</div>
          <p class="mt-2 text-sm text-white/70">Format pro / chill en début de soirée.</p>
        </div>
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-xs text-white/60">Occasionnel</div>
          <div class="mt-2 font-semibold">Soirées à thème</div>
          <p class="mt-2 text-sm text-white/70">Idéal pour donner une identité forte.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- PRIVATISATION --}}
  <section id="privatisation" class="border-t border-white/10 bg-black/20">
    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <h2 class="text-2xl md:text-3xl font-bold tracking-tight">Privatiser le bar</h2>
          <p class="mt-2 text-white/70 max-w-2xl">
            Anniversaire, pot de départ, évènement pro, soirée privée… On s’adapte à ton format.
            Laisse-nous ta demande et on te répond rapidement.
          </p>
        </div>

        <a href="#contact" class="text-sm text-white/70 hover:text-white underline underline-offset-4">
          Ou nous contacter directement
        </a>
      </div>

      <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Infos --}}
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Ce qu’on peut organiser</div>
          <ul class="mt-3 space-y-2 text-sm text-white/80">
            <li class="flex gap-2"><span class="text-[#ff7a18]">•</span> Privatisation partielle ou totale</li>
            <li class="flex gap-2"><span class="text-[#ff7a18]">•</span> Cocktails / bières / softs</li>
            <li class="flex gap-2"><span class="text-[#ff7a18]">•</span> DJ / musique / ambiance</li>
            <li class="flex gap-2"><span class="text-[#ff7a18]">•</span> Options snacking / planches</li>
          </ul>

          <div class="mt-6 rounded-2xl border border-white/10 bg-black/30 p-4">
            <div class="text-xs text-white/60">Astuce</div>
            <div class="mt-1 text-sm text-white/80">
              Indique la date, le nombre de personnes et le type d’évènement.
            </div>
          </div>
        </div>

        {{-- Form --}}
        <div class="lg:col-span-2 rounded-3xl border border-white/10 bg-gradient-to-br from-white/5 to-transparent p-6">
          <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="text-sm text-white/70">Nom</label>
              <input type="text" placeholder="Ton nom"
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50" />
            </div>

            <div>
              <label class="text-sm text-white/70">Téléphone</label>
              <input type="text" placeholder="06 .. .. .. .."
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50" />
            </div>

            <div>
              <label class="text-sm text-white/70">Date souhaitée</label>
              <input type="date"
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50" />
            </div>

            <div>
              <label class="text-sm text-white/70">Nombre de personnes</label>
              <input type="number" min="1" placeholder="ex: 25"
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50" />
            </div>

            <div class="md:col-span-2">
              <label class="text-sm text-white/70">Type d’évènement</label>
              <select
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50">
                <option>Anniversaire</option>
                <option>Pot de départ</option>
                <option>Évènement pro</option>
                <option>Soirée privée</option>
                <option>Autre</option>
              </select>
            </div>

            <div class="md:col-span-2">
              <label class="text-sm text-white/70">Message</label>
              <textarea rows="4" placeholder="Dis-nous ce que tu veux : horaires, ambiance, options…"
                class="mt-2 w-full rounded-2xl bg-black/40 border border-white/10 px-4 py-3 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#ff2a2a]/50"></textarea>
            </div>

            <div class="md:col-span-2 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
              <p class="text-xs text-white/50">
                (Démo) Ce formulaire n’envoie rien tant qu’on n’a pas branché le backend.
              </p>
              <button type="button"
                class="inline-flex items-center justify-center rounded-2xl px-6 py-3 font-semibold
                       bg-white text-black hover:bg-white/90 transition">
                Envoyer la demande
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  {{-- CONTACT --}}
  <section id="contact" class="border-t border-white/10">
    <div class="mx-auto max-w-6xl px-4 py-14 md:py-20">
      <h2 class="text-2xl md:text-3xl font-bold tracking-tight">Contact</h2>
      <p class="mt-2 text-white/70 max-w-2xl">
        Mets ici l’adresse, horaires, Insta, téléphone, Google Maps.
      </p>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Adresse</div>
          <div class="mt-2 font-semibold">Rouen</div>
          <div class="mt-1 text-sm text-white/70">À compléter</div>
        </div>

        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Téléphone</div>
          <div class="mt-2 font-semibold">—</div>
          <div class="mt-1 text-sm text-white/70">À compléter</div>
        </div>

        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <div class="text-sm text-white/60">Instagram</div>
          <div class="mt-2 font-semibold">—</div>
          <div class="mt-1 text-sm text-white/70">À compléter</div>
        </div>
      </div>

      <div class="mt-10 text-xs text-white/50">
        © {{ date('Y') }} Verre Gule — Tous droits réservés.
      </div>
    </div>
  </section>
@endsection
