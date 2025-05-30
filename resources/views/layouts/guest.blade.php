<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage UTF-8 pour les accents et caractères spéciaux -->
    <meta charset="UTF-8">

    <!-- Responsive mobile/desktop -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jeton CSRF pour sécurité Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre de la page -->
    <title>PredictiveMind - Invité</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Ton fichier CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- ✅ Animation AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>

<body class="bg-beige pt-5 px-3">

    <!-- 🔵 Navigation principale (logo + Accueil, Connexion, S’inscrire) -->
    @include('layouts.navigation')

    <!-- 📦 Zone principale : affichage unique du contenu -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-white text-dark rounded shadow p-5 w-100" style="max-width: 500px;" data-aos="zoom-in">
            @yield('guest-content') {{-- ✅ Le contenu dynamique s’injecte ici (ex: formulaire d’inscription) --}}
        </div>
    </div>

    <!-- ✅ Scripts JS Bootstrap et AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init(); // Initialisation de l'animation
    </script>

</body>
</html>
