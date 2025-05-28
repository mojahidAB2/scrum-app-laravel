
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