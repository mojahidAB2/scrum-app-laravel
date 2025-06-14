<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PredictiveMind - Invité</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Ton CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f9f2e7;
            padding-top: 90px; /* espace pour la navbar fixe */
        }

        .navbar-gradient {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: linear-gradient(to right, #B33791, #C562AF, #DB8DD0, #FEC5F6);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand img {
            height: 45px;
            margin-right: 8px;
        }

        .navbar-brand span {
            font-weight: bold;
            font-size: 20px;
            color: #fff;
        }

        .btn-login {
            background-color: white;
            color: #B33791;
            font-weight: bold;
        }

        .btn-register {
            background-color: #FFC107;
            color: black;
            font-weight: bold;
        }

        .btn-login:hover, .btn-register:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <!-- 🔵 NAVBAR FIXE GRADIENT -->
    <nav class="navbar navbar-expand-lg navbar-gradient">
        <div class="container">
            <!-- Logo + Texte -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="gap: 10px;">
    <div style="background-color: white; padding: 6px; border-radius: 8px;">
        <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" style="height: 40px;">
    </div>
    <span style="font-size: 20px; font-weight: bold; color: white;">PredictiveMind</span>
</a>


            <!-- Burger -->
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens -->
            <div class="collapse navbar-collapse" id="guestNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-register">S’inscrire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 📦 CONTENU -->
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
