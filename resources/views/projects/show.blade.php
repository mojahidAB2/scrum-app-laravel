<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du projet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails du projet : {{ $project->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nom du projet : {{ $project->name }}</h5>
                <p><strong>Description :</strong> {{ $project->description }}</p>
                <p><strong>Scrum Master :</strong> {{ $project->scrum_master }}</p>
                <p><strong>Date de début :</strong> {{ $project->start_date }}</p>
                <p><strong>Date de fin :</strong> {{ $project->end_date }}</p>
                
            </div>
        </div>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning mt-3">Modifier le projet</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Supprimer le projet</button>
        </form>
        <a href="{{ route('projects.editMembers', $project->id) }}" class="btn btn-success">
            Ajouter des membres à l'équipe
        </a>
        
    </div>


    <div>
        <h1>Projet : {{ $project->name }}</h1>

<!-- Bouton Créer Sprint -->
<a href="{{ route('sprints.createsprints', ['project' => $project->id]) }}" class="btn btn-primary">
    Créer un sprint
</a>


<a href="{{ route('sprints.create', $project->id) }}">Créer un sprint</a>

<!-- Liste des Sprints -->
<h2>Sprints associés</h2>

<ul>
@forelse($project->sprints as $sprint)
    <li>
        {{ $sprint->name }} : du {{ $sprint->start_date }} au {{ $sprint->end_date }}
    </li>
@empty
    <li>Aucun sprint associé pour ce projet.</li>
@endforelse
</ul>

    </div>


    <div>
        @foreach($project->sprints as $sprint)
    <li>
        {{ $sprint->name }} : du {{ $sprint->start_date }} au {{ $sprint->end_date }}

        <!-- Bouton Éditer -->
        <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn btn-primary">Modifier</a>



        <!-- Formulaire Supprimer -->
        <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Supprimer ce sprint ?')">Supprimer</button>
        </form>
    </li>
@endforeach

    </div>
    <div>
      <h3>Membres du projet {{ $project->name }}</h3>
<ul>
    @foreach($project->userss as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>

    </div>


<a href="{{ route('user_stories.view') }}" class="btn btn-secondary">Voir les User Stories</a>

<a href="{{ route('backlogs.view') }}" class="btn btn-secondary">
    Voir les Backlogs
</a>
<a href="{{ route('sprints.index', $project->id) }}">Voir les sprints</a>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
