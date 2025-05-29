<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage des caractères pour permettre l'affichage des accents et caractères spéciaux -->
    <meta charset="UTF-8">

    <!-- Rendre la page responsive (s'adapte à tous les écrans) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jeton de sécurité pour les formulaires Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre de la page -->
    <title>PredictiveMind</title>

    <!-- Importation de Bootstrap et Font Awesome pour les icônes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Fichier CSS personnalisé avec ta palette de couleurs -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bibliothèque d'animations AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>
<body class="bg-beige">

<!-- Barre de navigation fixe en haut de page -->
<nav class="navbar navbar-expand-md bg-blue-main text-white fixed-top shadow">
    <div class="container-fluid px-4">
        <!-- Logo + Nom du site -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="me-2 rounded shadow" style="height: 40px;">
            <strong>PredictiveMind</strong>
        </a>
        <!-- Boutons de connexion / inscription si l'utilisateur n'est pas connecté -->
        <div class="ms-auto">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Connexion</a>
                <a href="{{ route('register') }}" class="btn bg-gold text-dark btn-sm">S’inscrire</a>
            @endguest
        </div>
    </div>
</nav>

<!-- Carrousel d'images pour illustrer la plateforme -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="margin-top: 70px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="image2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="image3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <!-- Contrôles du carrousel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Section explicative sur la méthode Scrum -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image avec animation AOS -->
            <div class="col-md-6" data-aos="fade-right">
                <img src="scrum10.png" class="img-fluid rounded shadow" alt="Scrum">
            </div>
            <!-- Texte explicatif avec bouton d'inscription -->
            <div class="col-md-6" data-aos="fade-left">
                <h2 class="text-blue-main">Pourquoi la méthode Scrum ?</h2>
                <p>La méthode Scrum est un cadre agile qui favorise la collaboration, la transparence et l’adaptabilité...</p>
                <a href="{{ route('register') }}" class="btn bg-gold text-dark mt-3">Commencer maintenant</a>
            </div>
        </div>
    </div>
</section>

<!-- Section des fonctionnalités principales avec cartes animées -->
<section class="bg-light py-5">
    <div class="container text-center">
        <!-- Titre de section -->
        <h2 class="text-blue-main mb-5" data-aos="zoom-in">Fonctionnalités principales</h2>
        <div class="row g-4">
            <!-- Carte 1 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow transition-hover">
                    <img src="chatscrum7.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-gold">Gestion des Sprints</h5>
                        <p>Organisez vos sprints efficacement avec un tableau agile visuel.</p>
                    </div>
                </div>
            </div>
            <!-- Carte 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow transition-hover">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-gold">Collaboration en Équipe</h5>
                        <p>Facilitez la communication dans l’équipe Scrum.</p>
                    </div>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow transition-hover">
                    <img src="chatscrum5.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-gold">Suivi des Performances</h5>
                        <p>Visualisez l’avancement des projets en temps réel.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pied de page avec contact et liens rapides -->
<footer class="bg-blue-dark text-white py-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <!-- Logo + description -->
            <div class="col-md-4">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" style="height: 40px;">
                <p class="mt-2 small">Scrum vous aide à gérer vos projets avec agilité et performance.</p>
            </div>
            <!-- Liens rapides -->
            <div class="col-md-4">
                <h6 class="text-gold">Liens rapides</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-white">Accueil</a></li>
                    <li><a href="{{ route('projects.index') }}" class="text-white">Projets</a></li>
                    <li><a href="{{ route('sprints.index') }}" class="text-white">Sprints</a></li>
                    <li><a href="{{ route('register') }}" class="text-white">S’inscrire</a></li>
                </ul>
            </div>
            <!-- Coordonnées et réseaux sociaux -->
            <div class="col-md-4">
                <h6 class="text-gold">Contact</h6>
                <p><i class="fas fa-envelope"></i> contact@predictivemind.ma</p>
                <p><i class="fas fa-phone"></i> 0536 70 51 52</p>
                <div>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-light">
        <div class="text-center small">&copy; {{ date('Y') }} ScrumApp. Tous droits réservés.</div>
    </div>
</footer>

<!-- Scripts JS Bootstrap et initialisation AOS pour les animations -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
