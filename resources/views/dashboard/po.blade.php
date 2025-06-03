@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1e1e2f;
        color: #e22626;
    }

    .table-dark th, .table-dark td {
        color: #fff;
        vertical-align: middle;
    }

    .custom-card {
        background-color: #2b2c3d;
        color: #fff;
        border: 1px solid #3c3d50;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .btn-dark-blue {
        background-color: #3c4bd7;
        color: white;
    }

    .btn-dark-blue:hover {
        background-color: #2f3ab3;
    }
</style>

<div class="container mt-28"> {{-- mt-28 باش تبعد من navbar --}}

    <!-- Message d’accueil -->
    <h1 class="text-xl font-bold text-red-600 mb-3">Bienvenue Product Owner</h1>
    <a href="{{ route('projects.create') }}" class="text-blue-600 underline">Nouveau projet</a>

    <!-- Section statistiques -->
    <div class="custom-card mt-5">
        <h4 class="mb-3">Statistiques générales</h4>
        <table class="table table-dark table-hover text-center">
            <thead>
                <tr>
                    <th>Projets</th>
                    <th>User Stories</th>
                    <th>Backlogs</th>
                    <th>Sprints</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- Actions -->
<div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">

    <!-- 👉 Boutons Créer un projet + Ajouter une User Story -->
    <div class="text-end">
        <a href="{{ route('projects.create') }}" class="btn btn-outline-light me-2 mb-2">
            Créer un projet
        </a>
        <!-- 👉 Bouton Voir mes projets -->
    <a href="{{ route('projects.index') }}" class="btn btn-primary mb-2" style="font-weight: 600;">
        Voir mes projets
    </a>
        <a href="{{ route('user_stories.create') }}" class="btn btn-outline-warning mb-2">
            Ajouter une User Story
        </a>
          <!-- 👉 Bouton voir User Stories -->
        <a href="{{ route('user_stories.view') }}" class="btn btn-outline-success me-2">
    Voir mes User Stories
</a>

        <!-- 👉 Bouton Ajouter un Backlog -->
  <a href="{{ route('backlogs.create') }}" class="btn btn-outline-primary me-2">
    Ajouter un Backlog
</a>
           <!--  👉 Bouton Voir mes Backlogs -->
<a href="{{ route('backlogs.view') }}" class="btn btn-outline-dark">
    Voir mes Backlogs
</a>

    </div>

</div>


</div>
@endsection
