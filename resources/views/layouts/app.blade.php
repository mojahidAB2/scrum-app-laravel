<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage des caractères -->
    <meta charset="UTF-8">

    <!-- Adaptation à tous les types d'écrans (responsive) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jeton CSRF pour sécuriser les formulaires -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre de la page -->
    <title>PredictiveMind</title>

    <!-- 📦 Importation des fichiers CSS et JS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- 🌟 Importation de Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ Ajoute ton propre fichier CSS classique si nécessaire -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-white font-sans antialiased min-h-screen pt-24">

    <!-- 🚀 Barre de navigation principale -->
    @include('layouts.navigation')

    <!-- 📄 Contenu principal de la page (avec un padding-top pour éviter que le contenu soit masqué par la navbar fixe) -->
    <main class="pt-28">
        @yield('content')
    </main>

    <!-- 🧩 Pied de page (footer) -->
    @include('layouts.footer')

    <!-- 🧠 Pile de scripts supplémentaires spécifiques à chaque page -->
    @stack('scripts')
</body>
</html>
