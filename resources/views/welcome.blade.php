<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Scrum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<section>
<nav style="background: linear-gradient(to right, #3101c7, #9401c7, #c70197); color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.2); padding: 0.75rem 0; position: fixed; top: 0; left: 0; width: 100%; z-index: 50;">
    <div style="max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; display: flex; justify-content: space-between; align-items: center;">
        
        <!-- Logo -->
        <div style="display: flex; align-items: center; gap: 0.75rem;">
            <a href="{{ url('/') }}" style="display: flex; align-items: center; text-decoration: none;">
                <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind"
                     style="height: 3.5rem; width: auto; transition: transform 0.3s;" 
                     onmouseover="this.style.transform='scale(1.05)'" 
                     onmouseout="this.style.transform='scale(1)'">
                <span style="font-size: 1.5rem; font-weight: 800; text-shadow: 1px 1px 3px black; color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    PredictiveMind
                </span>
            </a>
        </div>

        <!-- Liens -->
        <div style="display: flex; gap: 1.5rem; align-items: center; font-family: 'Arial', sans-serif; font-size: 0.95rem;">
            @auth
                <a href="{{ route('dashboard') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('dashboard') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('dashboard') ? '#c79401' : 'white' }}'">
                    Dashboard
                </a>

                <a href="{{ route('projects.index') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('projects.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('projects.*') ? '#c79401' : 'white' }}'">
                    Projets
                </a>

                <a href="{{ route('sprints.index') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('sprints.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('sprints.*') ? '#c79401' : 'white' }}'">
                    Sprints
                </a>

                <a href="{{ route('user_stories.view') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('user_stories.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('user_stories.*') ? '#c79401' : 'white' }}'">
                    User Stories
                </a>

                <a href="{{ route('backlogs.view') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('backlogs.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('backlogs.*') ? '#c79401' : 'white' }}'">
                    Backlogs
                </a>

                <a href="{{ route('tasks.index') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('tasks.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('tasks.*') ? '#c79401' : 'white' }}'">
                    Tâches
                </a>

                <a href="{{ route('tasks.kanban') }}"
                   style="color: white; text-decoration: none; {{ request()->routeIs('kanban.*') ? 'color: #c79401; font-weight: bold;' : '' }}"
                   onmouseover="this.style.color='#FFD700'" 
                   onmouseout="this.style.color='{{ request()->routeIs('kanban.*') ? '#c79401' : 'white' }}'">
                    Kanban
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}" 
                   style="padding: 0.4rem 1rem; border: 2px solid white; border-radius: 6px; color: white; text-decoration: none; transition: all 0.3s;"
                   onmouseover="this.style.backgroundColor='#FFD700'; this.style.color='black';"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';">
                    Connexion
                </a>

                <a href="{{ route('register') }}" 
                   style="padding: 0.4rem 1rem; border: 2px solid white; border-radius: 6px; color: white; text-decoration: none; transition: all 0.3s;"
                   onmouseover="this.style.backgroundColor='#FFD700'; this.style.color='black';"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';">
                    S’inscrire
                </a>
            @endguest
        </div>
    </div>
</nav>    

</section>

<section style="height: 20%; width:86%;   padding-left:13%;    " >

<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image1.jpeg" class="d-block w-100" alt="Projet agile">
    </div>
    <div class="carousel-item">
      <img src="image2.jpg" class="d-block w-100" alt="Collaboration">
    </div>
    <div class="carousel-item">
      <img src="image3.jpg" class="d-block w-100" alt="Suivi de tâches">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</section>

<!-- Section image + texte -->
<section class="info-section" style="padding-top: 7%; ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-6 mb-md-0">
                <img src="scrum10.png" class="img-fluid rounded shadow" alt="Scrum illustration" width="85%" height="50%">
            </div>
            <div class="col-md-6">
                <h2 style="color: #c70134; font-family: 'Segoe UI', sans-serif;">Pourquoi la méthode Scrum ?</h2>
                <p  style="font-family: 'Segoe UI', sans-serif; font-size: 1.05rem; line-height: 1.7;">
                    La méthode Scrum est un cadre agile qui favorise la collaboration, la transparence et l’adaptabilité. 
                    En divisant un projet en petits cycles appelés sprints, Scrum permet aux équipes de livrer des résultats 
                    concrets rapidement tout en s’adaptant aux changements. Grâce à ses rituels (daily meetings, revues, rétrospectives), 
                    les membres de l’équipe restent synchronisés et impliqués. Cette méthode réduit les risques, améliore la qualité 
                    des livrables et accélère la mise sur le marché des produits. Scrum n’est pas qu’un outil de gestion, c’est 
                    une culture de travail efficace, moderne et humaine.
                </p>
                <a href="{{ route('register') }}" class="btn  mt-3" style="color: #ffffff; background-color:#3101c7;">Commencer maintenant</a>
            </div>
        </div>
    </div>
</section>



<section style="padding-top: 5%; ">
<section class="features py-5 bg-light" >
  <div class="container text-center">
    <h2 class="mb-5"  style="color: #c70134">Fonctionnalités principales</h2>
    <div class="row g-4">

      <!-- Carte 1 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="chatscrum7.jpg" class="card-img-top" alt="Gestion des Sprints">
          <div class="card-body">
            <h5 class="card-title" style="color: #c73101">Gestion des Sprints</h5>
            <p class="card-text">Organisez vos sprints de manière claire et efficace grâce à un tableau agile visuel.</p>
          </div>
        </div>
      </div>

      <!-- Carte 2 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" class="card-img-top" alt="Travail d'équipe agile">
          <div class="card-body">
            <h5 class="card-title" style="color: #c73101">Collaboration en Équipe</h5>
            <p class="card-text">Facilitez la communication et la collaboration avec toute l’équipe Scrum.</p>
          </div>
        </div>
      </div>

      <!-- Carte 3 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="chatscrum5.jpg" class="card-img-top" alt="Suivi de performance">
          <div class="card-body">
            <h5 class="card-title" style="color: #c73101">Suivi des Performances</h5>
            <p class="card-text">Visualisez l’avancement des projets grâce à des indicateurs et graphiques en temps réel.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
</section>





<footer style="background: linear-gradient(to right, #3101c7, #9401c7, #c70197); color: white; padding: 40px 0; font-family: 'Segoe UI', sans-serif;">
    <div class="container">
        <div class="row">

            <!-- Logo + Description -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" style="height: 50px; width: auto; margin-right: 10px;">
                    <h5 class="mb-0" style="font-weight: bold;">Scrum</h5>
                </div>
                <p style="font-size: 0.95rem;">
                    Scrum vous aide à gérer vos projets en toute agilité avec des outils intuitifs et performants basés sur la méthode Scrum.
                </p>
            </div>

            <!-- Liens utiles -->
            <div class="col-md-4 mb-4">
                <h6 style="font-weight: bold; margin-bottom: 15px;">Liens rapides</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" style="color: white; text-decoration: none;">Accueil</a></li>
                    <li><a href="{{ route('projects.index') }}" style="color: white; text-decoration: none;">Projets</a></li>
                    <li><a href="{{ route('sprints.index') }}" style="color: white; text-decoration: none;">Sprints</a></li>
                    <li><a href="{{ route('register') }}" style="color: white; text-decoration: none;">S’inscrire</a></li>
                </ul>
            </div>

            <!-- Contact + Réseaux -->
            <div class="col-md-4 mb-4">
                <h6 style="font-weight: bold; margin-bottom: 15px;">Contact</h6>
                <p><i class="fas fa-envelope"></i> contact@predictivemind.ma</p>
                <p><i class="fas fa-phone"></i> 0536 70 51 52</p>
                <div style="margin-top: 10px;">
                    <a href="#" style="color: white; margin-right: 10px;"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" style="color: white; margin-right: 10px;"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="#" style="color: white;"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>
        </div>

        <hr style="border-color: rgba(255,255,255,0.2);">
        <div class="text-center" style="font-size: 0.9rem;">
            &copy; {{ date('Y') }} ScrumApp. Tous droits réservés.
        </div>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>