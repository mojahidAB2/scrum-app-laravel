<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage des caractères pour permettre l'affichage des accents et caractères spéciaux -->
    <meta charset="UTF-8">

    <title>Accueil Scrum | PredictiveMind</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #6c63ff;
            --secondary: #ff6584;
            --dark: #2d3748;
            --light: #f7fafc;
            --gradient: linear-gradient(135deg, #6c63ff 0%, #ff6584 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #f9f9ff;
            color: var(--dark);
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%236c63ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>'), auto;
        }
        
        a, button {
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23ff6584" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>'), pointer;
        }
        
        /* Navbar */
        .navbar-scrum {
            background: var(--gradient);
            box-shadow: 0 4px 20px rgba(108, 99, 255, 0.2);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .navbar-scrum.scrolled {
            padding: 0.5rem 0;
            backdrop-filter: blur(10px);
            background: rgba(108, 99, 255, 0.95);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            font-family: 'Montserrat', sans-serif;
        }
        
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
            transition: transform 0.3s;
        }
        
        .navbar-brand:hover img {
            transform: rotate(15deg);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 0.5rem;
            position: relative;
            padding: 0.5rem 0;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link.active {
            font-weight: 600;
        }
        
        .btn-scrum {
            background: white;
            color: var(--primary) !important;
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
        }
        
        .btn-scrum:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
        }
        
        /* Hero Section */
        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.1) 0%, rgba(255, 101, 132, 0.1) 100%);
        }
        
        .hero-content {
            z-index: 2;
            position: relative;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark);
            line-height: 1.2;
            font-family: 'Montserrat', sans-serif;
        }
        
        .hero-title span {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #4a5568;
            max-width: 600px;
        }
        
        .hero-btns .btn {
            margin-right: 1rem;
            margin-bottom: 1rem;
        }
        
        .btn-primary-scrum {
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
        }
        
        .btn-primary-scrum:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.5);
        }
        
        .btn-outline-scrum {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-scrum:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.3);
        }
        
        .hero-image {
            position: relative;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .hero-image img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 30px rgba(108, 99, 255, 0.3));
        }
        
        /* Background Animation */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }
        
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.1) 0%, rgba(255, 101, 132, 0.1) 100%);
            animation: float 15s infinite linear;
        }
        
        .bg-circle:nth-child(1) {
            width: 600px;
            height: 600px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }
        
        .bg-circle:nth-child(2) {
            width: 400px;
            height: 400px;
            bottom: -50px;
            right: -50px;
            animation-delay: 2s;
            animation-direction: reverse;
        }
        
        .bg-circle:nth-child(3) {
            width: 300px;
            height: 300px;
            top: 30%;
            right: 20%;
            animation-delay: 4s;
        }
        
        /* Features Section */
        .features-section {
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--dark);
            position: relative;
            font-family: 'Montserrat', sans-serif;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(108, 99, 255, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
            z-index: 2;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(108, 99, 255, 0.2);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            background: rgba(108, 99, 255, 0.1);
            color: var(--primary);
            font-size: 1.75rem;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            background: var(--gradient);
            color: white;
            transform: rotate(15deg) scale(1.1);
        }
        
        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .feature-text {
            color: #718096;
            margin-bottom: 1.5rem;
        }
        
        /* Why Scrum Section */
        .why-scrum-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.03) 0%, rgba(255, 101, 132, 0.03) 100%);
            position: relative;
        }
        
        .why-scrum-image {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(108, 99, 255, 0.2);
            transform: perspective(1000px) rotateY(-10deg);
            transition: all 0.5s ease;
        }
        
        .why-scrum-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .why-scrum-image img {
            width: 100%;
            height: auto;
            transition: all 0.5s ease;
        }
        
        .why-scrum-image:hover img {
            transform: scale(1.05);
        }
        
        .why-scrum-content {
            padding-left: 3rem;
        }
        
        .why-scrum-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark);
            font-family: 'Montserrat', sans-serif;
        }
        
        .why-scrum-title span {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .why-scrum-text {
            color: #4a5568;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        .scrum-benefits {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }
        
        .scrum-benefits li {
            margin-bottom: 1rem;
            position: relative;
            padding-left: 2rem;
            color: #4a5568;
        }
        
        .scrum-benefits li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 0;
            color: var(--primary);
        }
        
        /* Testimonials Section */
        .testimonials-section {
            padding: 6rem 0;
            background: white;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin: 1rem;
            box-shadow: 0 10px 30px rgba(108, 99, 255, 0.1);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(108, 99, 255, 0.2);
        }
        
        .testimonial-text {
            font-style: italic;
            color: #4a5568;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .testimonial-text::before,
        .testimonial-text::after {
            content: '"';
            font-size: 3rem;
            color: rgba(108, 99, 255, 0.2);
            position: absolute;
        }
        
        .testimonial-text::before {
            top: -20px;
            left: -10px;
        }
        
        .testimonial-text::after {
            bottom: -40px;
            right: -10px;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .testimonial-author img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
            border: 3px solid var(--primary);
        }
        
        .author-info h5 {
            margin-bottom: 0;
            color: var(--dark);
            font-weight: 600;
        }
        
        .author-info p {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 6rem 0;
            background: var(--gradient);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .cta-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .cta-text {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn-cta {
            background: white;
            color: var(--primary) !important;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .cta-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .cta-particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: float 10s infinite linear;
        }
        
        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .footer-logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .footer-logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
        }
        
        .footer-about {
            margin-bottom: 2rem;
            color: #a0aec0;
        }
        
        .footer-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-contact p {
            margin-bottom: 1rem;
            color: #a0aec0;
            display: flex;
            align-items: center;
        }
        
        .footer-contact i {
            margin-right: 10px;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }
        
        .footer-social {
            display: flex;
            margin-top: 1.5rem;
        }
        
        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .footer-social a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            color: #a0aec0;
            font-size: 0.9rem;
        }
        
        /* Animations */
        .animate-up {
            animation: fadeInUp 1s ease;
        }
        
        .animate-down {
            animation: fadeInDown 1s ease;
        }
        
        .animate-left {
            animation: fadeInLeft 1s ease;
        }
        
        .animate-right {
            animation: fadeInRight 1s ease;
        }
        
        .animate-zoom {
            animation: zoomIn 1s ease;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .why-scrum-content {
                padding-left: 0;
                margin-top: 3rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .why-scrum-title {
                font-size: 2rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-btns .btn {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
            }
            
            .hero-btns .btn:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-scrum">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('logo.jpg') }}" alt="PredictiveMind">
                PredictiveMind
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('sprints.*') ? 'active' : '' }}" href="{{ route('sprints.index') }}">Sprints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user_stories.*') ? 'active' : '' }}" href="{{ route('user_stories.view') }}">User Stories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('backlogs.*') ? 'active' : '' }}" href="{{ route('backlogs.view') }}">Backlogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">Tâches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kanban.*') ? 'active' : '' }}" href="{{ route('tasks.kanban') }}">Kanban</a>
                        </li>
                    @endauth
                    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-scrum" href="{{ route('register') }}">S'inscrire</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="bg-animation">
            <div class="bg-circle"></div>
            <div class="bg-circle"></div>
            <div class="bg-circle"></div>
        </div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <h1 class="hero-title">Gérez les projets avec <span>Scrum Agile</span></h1>
                    <p class="hero-subtitle">Optimiser le workflow, collaborer efficacement et livrer des résultats exceptionnels avec notre plateforme de gestion Scrum intuitive.</p>
                    <div class="hero-btns">
                        <a href="{{ route('register') }}" class="btn btn-primary-scrum me-2 animate__animated animate__pulse animate__infinite">Commencer gratuitement</a>
                        <a href="#features" class="btn btn-outline-scrum">Découvrir plus</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image">
                        <img src="https://cdn.prod.website-files.com/62fcfcf2e1a4c21ed18b80e6/64ef47a94e9c500c81c2cf59_scrum_roles_wb5v.png" alt="Scrum Team Illustration" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Fonctionnalités puissantes</h2>
            
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3 class="feature-title">Gestion des Sprints</h3>
                        <p class="feature-text">Organisez vos sprints de manière claire et efficace grâce à un tableau agile visuel et des outils de planification intégrés.</p>
                        <a href="{{ route('sprints.index') }}" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Collaboration d'équipe</h3>
                        <p class="feature-text">Facilitez la communication et la collaboration avec toute l'équipe Scrum grâce à des outils de discussion intégrés.</p>
                        <a href="#" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Suivi des performances</h3>
                        <p class="feature-text">Visualisez l'avancement des projets grâce à des indicateurs et graphiques en temps réel et des rapports personnalisés.</p>
                        <a href="#" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="feature-title">Backlogs organisés</h3>
                        <p class="feature-text">Priorisez et gérez facilement votre backlog produit avec des outils de tri et de filtrage avancés.</p>
                        <a href="{{ route('backlogs.view') }}" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        <h3 class="feature-title">Tableaux Kanban</h3>
                        <p class="feature-text">Visualisez votre workflow avec des tableaux Kanban personnalisables pour un suivi visuel des tâches.</p>
                        <a href="{{ route('tasks.kanban') }}" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="feature-title">User Stories</h3>
                        <p class="feature-text">Créez et gérez des user stories détaillées avec des critères d'acceptation clairs et des estimations.</p>
                        <a href="{{ route('user_stories.view') }}" class="btn btn-sm btn-outline-scrum">Explorer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Scrum Section -->
    <section class="why-scrum-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="why-scrum-image">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c" alt="Scrum Team" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="why-scrum-content">
                        <h2 class="why-scrum-title">Pourquoi choisir <span>Scrum</span> ?</h2>
                        <p class="why-scrum-text">
                            La méthode Scrum est un cadre agile qui favorise la collaboration, la transparence et l'adaptabilité. 
                            En divisant un projet en petits cycles appelés sprints, Scrum permet aux équipes de livrer des résultats 
                            concrets rapidement tout en s'adaptant aux changements.
                        </p>
                        
                        <ul class="scrum-benefits">
                            <li>Livraison plus rapide de produits de haute qualité</li>
                            <li>Meilleure adaptabilité aux changements</li>
                            <li>Transparence et visibilité accrues</li>
                            <li>Amélioration continue grâce aux rétrospectives</li>
                            <li>Meilleure satisfaction des clients et des équipes</li>
                        </ul>
                        
                        <a href="{{ route('register') }}" class="btn btn-primary-scrum">Essayer gratuitement</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-particles">
            <div class="cta-particle" style="width: 20px; height: 20px; top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="cta-particle" style="width: 30px; height: 30px; top: 60%; left: 80%; animation-delay: 2s;"></div>
            <div class="cta-particle" style="width: 15px; height: 15px; top: 80%; left: 30%; animation-delay: 4s;"></div>
            <div class="cta-particle" style="width: 25px; height: 25px; top: 30%; left: 60%; animation-delay: 6s;"></div>
        </div>
        
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2 class="cta-title">Prêt à transformer notre gestion de projet ?</h2>
                <p class="cta-text">
                    Nous avons adopté PredictiveMind pour optimiser la gestion de nos projets Scrum au quotidien. Cette solution nous permet de structurer notre travail, de suivre nos tâches avec clarté et d’améliorer la collaboration entre nos équipes. L’essayer, c’est l’adopter.
                </p>
                <a href="{{ route('register') }}" class="btn btn-cta">Commencer maintenant</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-logo">
                        <img src="{{ asset('logo.jpg') }}" alt="PredictiveMind">
                        <span class="footer-logo-text">PredictiveMind</span>
                    </div>
                    <p class="footer-about">
                       Nous utilisons PredictiveMind pour structurer efficacement nos projets selon la méthodologie Scrum, grâce à des outils robustes qui facilitent la planification, le suivi des sprints et la collaboration inter-équipes.


                    </p>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h4 class="footer-title">Liens rapides</h4>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="{{ route('projects.index') }}">Projets</a></li>
                        <li><a href="{{ route('sprints.index') }}">Sprints</a></li>
                        <li><a href="{{ route('user_stories.view') }}">User Stories</a></li>
                        <li><a href="{{ route('register') }}">S'inscrire</a></li>
                    </ul>

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
                    <a href="#" class="text-white"><i class="fab fa-tw
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h4 class="footer-title">Ressources</h4>
                    <ul class="footer-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Centre d'aide</a></li>
                        <li><a href="#">Tutoriels</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h4 class="footer-title">Contact</h4>
                    <div class="footer-contact">
                        <p><i class="fas fa-envelope"></i> contact@predictivemind.ma</p>
                        <p><i class="fas fa-phone"></i> 0536 70 51 52</p>
                        <p><i class="fas fa-map-marker-alt"></i> Oujda, Maroc</p>
                    </div>
                    
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} PredictiveMind. Tous droits réservés.</p>
            </div>
        </div>

    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- GSAP (Advanced Animations) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-scrum');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Floating animation for feature cards on hover
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    y: -10,
                    boxShadow: '0 15px 40px rgba(108, 99, 255, 0.2)',
                    duration: 0.3
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    y: 0,
                    boxShadow: '0 10px 30px rgba(108, 99, 255, 0.1)',
                    duration: 0.3
                });
            });
        });
        
        // Particle animation for CTA section
        const ctaParticles = document.querySelectorAll('.cta-particle');
        ctaParticles.forEach(particle => {
            const randomX = Math.random() * 100;
            const randomY = Math.random() * 100;
            const randomDelay = Math.random() * 5;
            const randomDuration = 5 + Math.random() * 10;
            
            gsap.to(particle, {
                x: randomX,
                y: randomY,
                duration: randomDuration,
                delay: randomDelay,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut'
            });
        });
        
        // Background circle animation
        const bgCircles = document.querySelectorAll('.bg-circle');
        bgCircles.forEach((circle, index) => {
            const randomX = 50 + (Math.random() * 100 - 50);
            const randomY = 50 + (Math.random() * 100 - 50);
            const randomDuration = 15 + Math.random() * 10;
            
            gsap.to(circle, {
                x: randomX,
                y: randomY,
                duration: randomDuration,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut'
            });
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

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
