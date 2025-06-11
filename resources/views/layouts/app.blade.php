<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PredictiveMind</title>

    {{-- 📦 CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- 🌟 Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- 🎨 Fichier CSS classique --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background-color: white; font-family: sans-serif; padding-top: 100px;">

    {{-- 🚀 Navigation --}}
    @include('layouts.navigation')

    {{-- 📄 Contenu principal --}}
    <main>
        @yield('content')
    </main>

    {{-- 🔻 Footer --}}
   @if (Request::is('/'))
    @include('layouts.footer')
@endif


    {{-- 📜 Scripts supplémentaires --}}
    @stack('scripts')

</body>
</html>
