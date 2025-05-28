<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PredictiveMind</title>

    {{-- ❌ Retirer Vite si tu n’utilises plus Tailwind --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- 🌟 Font Awesome (optionnel) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ Ajoute ton propre fichier CSS classique si nécessaire -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    @stack('scripts')
</body>
</html>
