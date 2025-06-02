<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage UTF-8 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PredictiveMind - Invité</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (facultatif pour icônes) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Ton CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-beige pt-5 px-3">

    <!-- 🔵 NAVBAR ZWINA b DEGRADÉ + boutons -->
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #6c63ff, #ff6584); box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
                PredictiveMind
            </a>

            <!-- Bouton burger mobile -->
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens -->
            <div class="collapse navbar-collapse" id="guestNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-light me-2">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-warning text-dark fw-semibold">S’inscrire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 📦 CONTENU PRINCIPAL -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-white text-dark rounded shadow p-5 w-100" style="max-width: 500px;" data-aos="zoom-in">
            @yield('guest-content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>
