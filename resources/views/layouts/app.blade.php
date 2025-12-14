<!doctype html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Verre Gule — Bar à Rouen')</title>

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#0B0B0F] text-white antialiased">
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
