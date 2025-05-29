<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage UTF-8 pour les accents et caractères spéciaux -->
    <meta charset="UTF-8">
    <!-- Responsive mobile/desktop -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jeton CSRF pour sécurité Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PredictiveMind - Invité</title>

    <style>
        body {
            background: linear-gradient(to bottom right, #c3c0c4, #6260e0);
            min-height: 100vh;
            padding-top: 120px;
            padding-left: 16px;
            padding-right: 16px;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .guest-container {
            background-color: #1a202c;
            color: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 32px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
=======

    <!-- Titre de la page -->
    <title>PredictiveMind - Invité</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- ✅ Ton fichier CSS personnalisé (palette + effets) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- ✅ Animation AOS (Animate on Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>

<body class="bg-beige pt-5 px-3">

    <!-- 🔵 Navigation principale (logo + liens) -->
    @include('layouts.navigation')


    {{-- ✅ Contenu invité --}}
    <div class="guest-container">
        @yield('guest-content')
    <!-- 📦 Contenu dynamique (formulaires invités) -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-white text-dark rounded shadow p-5 w-100" style="max-width: 500px;" data-aos="zoom-in">
            @yield('guest-content')
        </div>

    </div>

    <!-- ✅ Scripts JS (Bootstrap + AOS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
