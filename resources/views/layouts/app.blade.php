<!doctype html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Verre Gule — Bar à Rouen')</title>
  <meta name="description" content="@yield('meta_description', 'Verre Gule à Rouen : bar-brasserie convivial, plats faits maison, bières, vins, cocktails, happy hour. Contact / privatisation sur demande.')">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <meta name="theme-color" content="#0B0B0F">

  <link rel="canonical" href="@yield('canonical', url()->current())">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Verre Gule">
  <meta property="og:title" content="@yield('og_title', 'Verre Gule — Bar à Rouen')">
  <meta property="og:description" content="@yield('og_description', 'Bar-brasserie convivial à Rouen : carte variée, happy hour, plats maison. Contact / privatisation sur demande.')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:image" content="@yield('og_image', asset('images/og-verre-gule.jpg'))">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('og_title', 'Verre Gule — Bar à Rouen')">
  <meta name="twitter:description" content="@yield('og_description', 'Bar-brasserie convivial à Rouen : carte variée, happy hour, plats maison. Contact / privatisation sur demande.')">
  <meta name="twitter:image" content="@yield('og_image', asset('images/og-verre-gule.jpg'))">

  <link rel="icon" href="{{ asset('favicon.ico') }}">

  @yield('jsonld')

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#0B0B0F] text-white antialiased selection:bg-[#F53003]/30 selection:text-white">
  <div class="min-h-screen flex flex-col">
    <x-navbar />

    <main class="flex-1">
      @yield('content')
    </main>

    <x-footer />
  </div>

  @stack('scripts')
</body>
</html>
