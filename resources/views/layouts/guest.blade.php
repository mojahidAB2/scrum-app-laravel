<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PredictiveMind') }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Styles & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Palette personnalisée --}}
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to bottom right, #ba3dd1, #f18ac5);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    {{-- Boîte centrale --}}
    <div class="w-full max-w-md px-8 py-10 bg-white shadow-xl rounded-xl">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" class="h-16 rounded-full shadow-md">
        </div>

        {{-- Titre / Texte introductif --}}
        <h2 class="text-center text-2xl font-bold text-[#ba3dd1] mb-4">Bienvenue sur <span class="text-[#f18ac5]">PredictiveMind</span></h2>
        <p class="text-center text-gray-500 text-sm mb-6">
            Veuillez vous connecter ou créer un compte pour accéder à votre espace.
        </p>

        {{-- Contenu dynamique (slot) --}}
        <div>
            {{ $slot }}
        </div>

        {{-- Lien vers accueil --}}
        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="text-sm text-[#ba3dd1] hover:underline">
                ← Retour à l'accueil
            </a>
        </div>
    </div>

</body>
</html>
