@extends('layouts.app')

@section('title', 'Verre Gule — Bar à Rouen | Cocktails, Happy Hour, Contact')
@section('meta_description', "Verre Gule à Rouen : bar-brasserie convivial, plats maison, bières, vins, cocktails, happy hour (18h–22h). Contact pour infos ou privatisation.")
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
    'openingHoursSpecification' => [
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Tuesday','opens'=>'16:00','closes'=>'02:00'],
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Wednesday','opens'=>'16:00','closes'=>'02:00'],
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Thursday','opens'=>'16:00','closes'=>'02:00'],
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Friday','opens'=>'16:00','closes'=>'02:00'],
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Saturday','opens'=>'16:00','closes'=>'02:00'],
      ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Sunday','opens'=>'15:00','closes'=>'23:30'],
    ],
  ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endsection

@section('content')
@php
  $accent = '#F53003';

  $hoursText = [
    'Lundi' => 'Fermé',
    'Mardi' => '16:00 – 02:00',
    'Mercredi' => '16:00 – 02:00',
    'Jeudi' => '16:00 – 02:00',
    'Vendredi' => '16:00 – 02:00',
    'Samedi' => '16:00 – 02:00',
    'Dimanche' => '15:00 – 23:30',
  ];

  // Menu (ton tableau complet)
$menu = [
  'Bières pression' => [
    ['name' => 'Tuborg (25cl)', 'price' => '3,50€'],
    ['name' => 'Tuborg (33cl)', 'price' => '4,50€'],
    ['name' => 'Tuborg (50cl)', 'price' => '5,50€'],

    ['name' => 'Pietra Rossa (25cl)', 'price' => '4,20€'],
    ['name' => 'Pietra Rossa (33cl)', 'price' => '5,50€'],
    ['name' => 'Pietra Rossa (50cl)', 'price' => '7,00€'],

    ['name' => 'La Bête (25cl)', 'price' => '4,80€'],
    ['name' => 'La Bête (33cl)', 'price' => '5,80€'],
    ['name' => 'La Bête (50cl)', 'price' => '7,50€'],

    ['name' => 'Brooklyn (25cl)', 'price' => '5,20€'],
    ['name' => 'Brooklyn (33cl)', 'price' => '6,50€'],
    ['name' => 'Brooklyn (50cl)', 'price' => '8,50€'],
  ],

  'Bières bouteille' => [
    ['name' => 'Desperados', 'price' => '4,80€'],
    ['name' => 'Cidre', 'price' => '4,90€'],
    ['name' => 'La Chouffe', 'price' => '4,80€'],
    ['name' => 'Bière sans alcool', 'price' => '3,80€'],
  ],

  'Vins blancs' => [
    ['name' => 'Uby N°4 IGP Méditerranée (12cl)', 'price' => '4,50€'],
    ['name' => 'Uby N°4 IGP Méditerranée (75cl)', 'price' => '20,00€'],
    ['name' => "Chardonnay CAMAS IGP Pays d’OC (12cl)", 'price' => '5,00€'],
    ['name' => "Chardonnay CAMAS IGP Pays d’OC (75cl)", 'price' => '22,00€'],
  ],

  'Vins rosés' => [
    ['name' => 'Rosé & Clair IGP Méditerranée (12cl)', 'price' => '5,00€'],
    ['name' => 'Rosé & Clair IGP Méditerranée (75cl)', 'price' => '21,00€'],
    ['name' => "Chat Minuty C de Provence AOP (12cl)", 'price' => '5,80€'],
    ['name' => "Chat Minuty C de Provence AOP (75cl)", 'price' => '26,00€'],
  ],

  'Vins rouges' => [
    ['name' => 'Uby N°7 Merlot IGP Côtes de Gascogne (12cl)', 'price' => '4,50€'],
    ['name' => 'Uby N°7 Merlot IGP Côtes de Gascogne (75cl)', 'price' => '19,00€'],
    ['name' => "Côte du Rhône AOP Caprice d’Antoine (12cl)", 'price' => '5,00€'],
    ['name' => "Côte du Rhône AOP Caprice d’Antoine (75cl)", 'price' => '21,00€'],
  ],

  'Champagne' => [
    ['name' => 'Saint Charles (12cl)', 'price' => '6,00€'],
    ['name' => 'Saint Charles (75cl)', 'price' => '35,00€'],
    ['name' => 'Moët & Chandon (12cl)', 'price' => '7,00€'],
    ['name' => 'Moët & Chandon (75cl)', 'price' => '48,00€'],
  ],

  'Cocktails' => [
    ['name' => 'Mojito', 'price' => '7,50€'],
    ['name' => 'Sex On The Beach', 'price' => '8,50€'],
    ['name' => 'Piña Colada', 'price' => '8,00€'],
    ['name' => 'Aperol Spritz', 'price' => '7,50€'],
    ['name' => 'Gin Tonic', 'price' => '8,00€'],
    ['name' => 'Margarita', 'price' => '8,50€'],
    ['name' => 'Porn Star Martini', 'price' => '8,50€'],
    ['name' => 'Moscow / London Mule', 'price' => '8,50€'],
    ['name' => 'Long Island', 'price' => '9,50€'],
  ],

  'Cocktails sans alcool' => [
    ['name' => 'Virgin Mojito', 'price' => '5,50€'],
    ['name' => 'Virgin Colada', 'price' => '5,50€'],
    ['name' => 'Bora Bora', 'price' => '5,50€'],
    ['name' => 'Framboise & Hibiscus', 'price' => '6,00€'],
    ['name' => 'Verre Gule', 'price' => '6,00€'],
  ],

  'Shooters' => [
    ['name' => 'Orgasme', 'price' => '3,00€'],
    ['name' => 'Get & Malibu', 'price' => '3,00€'],
    ['name' => 'Malibu Sunset', 'price' => '3,00€'],
    ['name' => 'Polar', 'price' => '3,00€'],
    ['name' => 'Kamikaze', 'price' => '3,50€'],
    ['name' => 'Tequila Shot', 'price' => '3,50€'],
    ['name' => 'Jägerbomb Shot', 'price' => '3,50€'],
    ['name' => 'Blue Shot', 'price' => '3,50€'],
    ['name' => 'Purple Shot', 'price' => '3,50€'],
    ['name' => 'Punch Shot', 'price' => '3,50€'],
    ['name' => 'Le Fire', 'price' => '3,50€'],
    ['name' => 'Formule 4 shooters', 'price' => '10,80€'],
    ['name' => 'Formule 6 shooters', 'price' => '15,80€'],
    ['name' => 'Formule Verre Gule (10 shooters)', 'price' => '24,90€'],
  ],

  'Softs' => [
    ['name' => 'Coca / Zéro', 'price' => '3,50€ (33cl) • 5,50€ (1L)'],
    ['name' => 'Schweppes (Agrumes / Tonic)', 'price' => '3,50€ (33cl) • 5,50€ (1L)'],
    ['name' => 'Red Bull', 'price' => '3,50€'],
    ['name' => 'Diabolo', 'price' => '3,50€'],
    ['name' => 'Jus (Abricot, Pomme, Orange, Ananas)', 'price' => '3,50€'],
    ['name' => 'Oasis', 'price' => '3,50€'],
    ['name' => 'Fuze Tea', 'price' => '3,50€'],
    ['name' => 'Perrier', 'price' => '3,50€ (33cl) • 4,50€ (1L)'],
    ['name' => 'San Pellegrino', 'price' => '3,50€ (33cl) • 5,00€ (1L)'],
  ],

  'Boissons chaudes' => [
    ['name' => 'Espresso / Allongé', 'price' => '1,80€ • 2,20€'],
    ['name' => 'Cappuccino / Café crème', 'price' => '3,00€'],
    ['name' => 'Thé', 'price' => '3,00€'],
    ['name' => 'Chocolat chaud', 'price' => '3,00€'],
  ],

  'Apéritifs' => [
    ['name' => 'Kir vin blanc', 'price' => '3,50€'],
    ['name' => 'Kir prosecco', 'price' => '3,50€'],
    ['name' => 'Ricard', 'price' => '3,50€'],
    ['name' => 'Martini (blanco / rosso)', 'price' => '3,50€'],
  ],

  'Gin' => [
    ['name' => "Gordon's", 'price' => '5,50€'],
    ['name' => 'Bombay Saphir', 'price' => '6,00€'],
    ['name' => "Hendrick's", 'price' => '7,00€'],
  ],

  'Whisky' => [
    ['name' => 'Ballantines', 'price' => '5,50€'],
    ['name' => 'Clan Campbell', 'price' => '5,00€'],
    ['name' => "Jack Daniel's", 'price' => '7,00€'],
    ['name' => 'Chivas', 'price' => '8,00€'],
  ],

  'Vodka' => [
    ['name' => 'Smirnoff', 'price' => '5,00€'],
    ['name' => 'Absolut', 'price' => '6,00€'],
    ['name' => 'Grey Goose', 'price' => '8,00€'],
  ],

  'Autres alcools' => [
    ['name' => 'Jäger Meister', 'price' => '5,00€'],
    ['name' => 'Jäger Bomb', 'price' => '7,50€'],
    ['name' => 'Absinthe', 'price' => '9,00€'],
  ],

  'Digestifs' => [
    ['name' => 'Get 27', 'price' => '5,50€'],
    ['name' => 'Get 31', 'price' => '6,00€'],
    ['name' => 'Baileys', 'price' => '5,50€'],
  ],

  'À manger' => [
    ['name' => 'Salade César', 'price' => '9,00€'],
    ['name' => 'Salade de chèvre', 'price' => '8,00€'],
    ['name' => 'Salade Italienne', 'price' => '8,50€'],
    ['name' => 'Burger Classic', 'price' => '11,50€'],
    ['name' => 'Burger Végé', 'price' => '9,50€'],
    ['name' => 'Burger Poulet', 'price' => '11,00€'],
    ['name' => 'Croque Monsieur', 'price' => '8,50€'],
    ['name' => 'Croque Madame', 'price' => '9,50€'],
    ['name' => 'Pâtes au saumon', 'price' => '12,00€'],
    ['name' => 'Pâtes bolo', 'price' => '10,00€'],
    ['name' => 'Bruschetta Margherita', 'price' => '7,50€'],
    ['name' => 'Bruschetta Saumon', 'price' => '8,50€'],
    ['name' => 'Bruschetta Triple Cheese', 'price' => '8,00€'],
    ['name' => 'Entrecôte / Faux filet + frites + salade', 'price' => '16,50€'],
    ['name' => 'Crème brûlée', 'price' => '4,50€'],
    ['name' => 'Dame blanche (3 boules)', 'price' => '4,00€'],
    ['name' => 'Moelleux au chocolat', 'price' => '4,50€'],
  ],
];


  $sellingPoints = [
    ['title' => 'Ambiance chill → festive', 'desc' => "Afterwork, puis la vibe monte au fil de la soirée.", 'tag' => 'Vibe'],
    ['title' => 'Carte bien fournie', 'desc' => 'Bières, vins, cocktails, shooters, softs.', 'tag' => 'Carte'],
    ['title' => 'Bar-brasserie', 'desc' => 'De quoi manger sans prise de tête.', 'tag' => 'Food'],
    ['title' => 'Groupes', 'desc' => 'Infos ou privatisation : on s’adapte.', 'tag' => 'Contact'],
  ];
@endphp

{{-- HERO --}}
<section class="relative overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute inset-0 bg-[radial-gradient(900px_500px_at_15%_10%,rgba(245,48,3,.28),transparent_60%),radial-gradient(700px_450px_at_85%_20%,rgba(255,200,120,.14),transparent_55%),radial-gradient(700px_700px_at_50%_100%,rgba(255,255,255,.06),transparent_60%)]"></div>
    <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay"
      style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22400%22%3E%3Cfilter id=%22n%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%224%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22400%22 height=%22400%22 filter=%22url(%23n)%22 opacity=%220.35%22/%3E%3C/svg%3E');"></div>
  </div>

  <div class="relative mx-auto max-w-6xl px-4 pt-12 pb-10 md:pt-16 md:pb-16">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
      <div>
        <p class="inline-flex items-center gap-2 text-xs tracking-wide uppercase text-white/60">
          <span class="size-1.5 rounded-full bg-[#F53003] shadow-[0_0_24px_rgba(245,48,3,.6)]"></span>
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
          et profiter d’une ambiance détendue. Happy Hour <span class="text-white/90 font-medium">18h–22h</span>.
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
            <p class="text-sm mt-1">18h – 22h</p>
          </div>
        </div>
      </div>

      <div class="relative">
        <div class="absolute -inset-6 blur-2xl bg-[radial-gradient(closest-side,rgba(245,48,3,.22),transparent)]"></div>

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
              <span class="px-3 py-1.5 rounded-full border border-white/10 bg-white/5">Happy hour 18h–22h</span>
            </div>
          </div>

          {{-- pas de CTA ici (tu veux un seul bouton) --}}
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

      <div class="mt-6 rounded-2xl border border-white/10 bg-white/5 p-5">
        <p class="text-white/90 font-semibold">Infos / groupes</p>
        <p class="mt-2 text-sm text-white/70 leading-relaxed">
          Tu veux juste une info (horaires, table, carte) ou organiser un truc (afterwork, anniversaire) ?
          Passe par <span class="text-white/90 font-medium">Contact</span> : on répond sous 24h.
        </p>
      </div>
    </div>

    <div class="lg:col-span-7 grid sm:grid-cols-2 gap-4">
      @foreach ([
        ['title' => 'Convivial', 'desc' => 'Entre amis, collègues, famille.'],
        ['title' => 'Carte variée', 'desc' => 'Pressions, cocktails, shooters, softs.'],
        ['title' => 'Bar-brasserie', 'desc' => 'De quoi manger sur place.'],
        ['title' => 'Happy Hour', 'desc' => 'Tous les jours d’ouverture : 18h–22h.'],
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
  <div class="rounded-3xl border border-white/10 bg-[radial-gradient(900px_500px_at_20%_0%,rgba(245,48,3,.18),transparent_60%)] bg-white/5 p-6 md:p-8">
    <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">Happy Hour</h2>
    <p class="mt-2 text-white/70">Tous les jours d’ouverture : <span class="text-white/90 font-medium">18h – 22h</span>.</p>

    <div class="mt-6 grid sm:grid-cols-3 gap-4">
      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="font-semibold">Bon plan</p>
        <p class="mt-2 text-sm text-white/70">Tu viens tôt → tu payes moins → tu profites plus.</p>
      </div>
      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="font-semibold">Ambiance</p>
        <p class="mt-2 text-sm text-white/70">Le bar se remplit, la vibe monte naturellement.</p>
      </div>
      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="font-semibold">Simple</p>
        <p class="mt-2 text-sm text-white/70">Cocktails, bières, vins — tu choisis.</p>
      </div>
    </div>
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
          <div class="flex justify-between"><span>Lundi</span><span class="text-white/60">Fermé</span></div>
          <div class="flex justify-between"><span>Mardi</span><span>16:00 – 02:00</span></div>
          <div class="flex justify-between"><span>Mercredi</span><span>16:00 – 02:00</span></div>
          <div class="flex justify-between"><span>Jeudi</span><span>16:00 – 02:00</span></div>
          <div class="flex justify-between"><span>Vendredi</span><span>16:00 – 02:00</span></div>
          <div class="flex justify-between"><span>Samedi</span><span>16:00 – 02:00</span></div>
          <div class="flex justify-between"><span>Dimanche</span><span>15:00 – 23:30</span></div>
        </div>
        <p class="mt-3 text-xs text-white/50">Happy Hour : <span class="text-white/70">18h – 22h</span></p>
      </div>

      {{-- Accès détaillé --}}
      <div class="rounded-2xl border border-white/10 bg-[#0B0B0F]/40 p-5">
        <p class="text-white/60 text-xs">Accès (rapide)</p>

        <ul class="mt-2 space-y-2 text-sm text-white/80">
          <li>🚶 ≈ 2–4 min : Place du Vieux-Marché (Église Sainte-Jeanne-d’Arc)</li>
          <li>🚇 Métro/Tram : Palais de Justice ou Théâtre des Arts</li>
          <li>🚌 TEOR : centre / Vieux-Marché</li>
          <li>🚗 Parking : Vieux-Marché, Palais de Justice, Cathédrale / Square des Arts</li>
        </ul>

        <p class="mt-3 text-xs text-white/50">
          Repère : angle Rue Saint-Etienne des Tonneliers / Rue de Champmeslé.
        </p>
      </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
      <a target="_blank" rel="noopener"
         href="https://www.google.com/maps/search/?api=1&query=Verre%20Gule%2019%20Rue%20Saint-Etienne%20des%20Tonneliers%2076000%20Rouen"
         class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold border border-white/15 hover:bg-white/5 transition">
        Itinéraire (Google Maps)
      </a>

      <button type="button" data-open-contact
         class="inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-semibold bg-[#F53003] hover:brightness-110 transition">
        Contact
      </button>
    </div>
  </div>
</section>


{{-- MODAL CARTE --}}
<div class="fixed inset-0 z-[70] hidden" data-menu-modal aria-hidden="true">
  <div class="absolute inset-0 bg-black/70" data-close-menu></div>

  <div class="relative mx-auto max-w-3xl px-4 py-8">
    <div class="rounded-3xl border border-white/10 bg-[#0B0B0F] shadow-2xl overflow-hidden">
      <div class="p-6 border-b border-white/10 flex items-start justify-between gap-4">
        <div>
          <p class="text-white font-semibold text-lg">La carte</p>
          <p class="text-white/70 text-sm mt-1">Happy Hour : 18h – 22h</p>
        </div>
        <button type="button" class="size-10 rounded-xl border border-white/10 hover:bg-white/5 transition grid place-items-center"
                aria-label="Fermer" data-close-menu>✕</button>
      </div>

      <div class="p-6 max-h-[70vh] overflow-auto space-y-6">
        @foreach($menu as $category => $items)
          <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
            <h3 class="text-lg font-semibold">{{ $category }}</h3>
            <ul class="mt-4 space-y-2">
              @foreach($items as $i)
                <li class="flex items-start justify-between gap-4">
                  <p class="text-white/90 text-sm font-medium">{{ $i['name'] }}</p>
                  <p class="text-sm text-white/70 whitespace-nowrap">{{ $i['price'] }}</p>
                </li>
              @endforeach
            </ul>
          </div>
        @endforeach
        <p class="text-xs text-white/50">* Carte susceptible d’évoluer selon les produits et la saison.</p>
      </div>
    </div>
  </div>
</div>

{{-- MODAL CONTACT (unique) --}}
<div class="fixed inset-0 z-[80] hidden" data-contact-modal aria-hidden="true">
  <div class="absolute inset-0 bg-black/70" data-close-contact></div>

  <div class="relative mx-auto max-w-xl px-4 py-10">
    <div class="rounded-3xl border border-white/10 bg-[#0B0B0F] shadow-2xl overflow-hidden">

      <div class="p-6 border-b border-white/10">
        <div class="flex items-start justify-between gap-4">
          <div>
            <p class="text-white font-semibold text-lg">Contact</p>
            <p class="text-white/70 text-sm mt-1">Infos ou privatisation : on te répond vite.</p>
          </div>
          <button type="button"
                  class="size-10 rounded-xl border border-white/10 hover:bg-white/5 transition grid place-items-center"
                  aria-label="Fermer"
                  data-close-contact>✕</button>
        </div>
      </div>

      <form class="p-6 space-y-4" action="#" method="POST">
        @csrf

        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="text-xs text-white/60">Nom</label>
            <input name="name" required
                   class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
                   placeholder="Mehdi">
          </div>
          <div>
            <label class="text-xs text-white/60">Téléphone</label>
            <input name="phone"
                   class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
                   placeholder="06…">
          </div>
        </div>

        <div>
          <label class="text-xs text-white/60">Sujet</label>
          <select name="subject" required
                  class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30">
            <option value="information">Information</option>
            <option value="privatisation">Privatisation</option>
          </select>
        </div>

        <div>
          <label class="text-xs text-white/60">Message</label>
          <textarea name="message" rows="4" required
                    class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-sm outline-none focus:border-white/30"
                    placeholder="Dis-nous ce que tu veux (date / nombre si privatisation, ou ta question)"></textarea>
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
            class="sm:flex-1 px-5 py-3 rounded-xl text-sm font-semibold bg-[#F53003] hover:brightness-110 transition">
            Envoyer
          </button>
        </div>

        <p class="text-xs text-white/50">
          Aucune obligation. Réponse sous <span class="text-white/70">24h maximum</span>.
        </p>
      </form>
    </div>
  </div>
</div>

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

  // Helpers
  const lock = () => document.documentElement.classList.add('overflow-hidden');
  const unlock = () => document.documentElement.classList.remove('overflow-hidden');

  // Menu modal
  const openMenuBtns = document.querySelectorAll('[data-open-menu]');
  const menuModal = document.querySelector('[data-menu-modal]');
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
  const openContactBtns = document.querySelectorAll('[data-open-contact]');
  const contactModal = document.querySelector('[data-contact-modal]');
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

  // ESC ferme la modal ouverte (priorité contact)
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    if (contactModal && !contactModal.classList.contains('hidden')) return closeContact();
    if (menuModal && !menuModal.classList.contains('hidden')) return closeMenu();
  });
})();
</script>
@endpush
