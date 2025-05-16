@extends('layouts.app')

@section('content')
<div class="project-details-container">
    <h2 class="title">Détails du projet : {{ $project->name }}</h2>

    <div class="card-details">
        <p><strong>Nom du projet :</strong> {{ $project->name }}</p>
        <p><strong>Description :</strong> {{ $project->description }}</p>
        <p><strong>Scrum Master :</strong> {{ $project->scrum_master }}</p>
        <p><strong>Date de début :</strong> {{ $project->start_date }}</p>
        <p><strong>Date de fin :</strong> {{ $project->end_date }}</p>
    </div>

    <div class="action-buttons">
        <a href="{{ route('projects.index') }}" class="btn btn-gray">Retour</a>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-yellow">Modifier</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-red">Supprimer</button>
        </form>
        <a href="{{ route('projects.editMembers', $project->id) }}" class="btn btn-green">Ajouter membres</a>
    </div>

    <h3 class="sub-title">Sprints associés</h3>
    @if($project->sprints && $project->sprints->count() > 0)
        <ul class="sprint-list">
            @foreach($project->sprints as $sprint)
                <li>{{ $sprint->name }} ({{ $sprint->start_date }} → {{ $sprint->end_date }})</li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Aucun sprint associé pour ce projet.</p>
    @endif

    <h3 class="sub-title">Liens rapides</h3>
<div class="quick-links">
    <a href="{{ route('userstories.byProject', ['project' => $project->id]) }}" class="btn btn-dark">User Stories</a>
    <a href="{{ route('backlogs.byProject', ['project' => $project->id]) }}" class="btn btn-dark">Backlogs</a>
    <a href="{{ route('sprints.byProject', ['project' => $project->id]) }}" class="btn btn-dark">Sprints</a>
    <a href="{{ route('projects.membersList', $project->id) }}" class="btn btn-info"> Voir les membres</a>
    <a href="{{ route('burndown.index') }}" class="btn btn-info"> Burndown Chart</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-dark">Tâches</a>
    <a href="{{ route('tasks.kanban') }}" class="btn btn-dark">Kanban</a>
</div>

</div>

<style>
body {
    background-color: #1c1f2e;
    color: #f0f0f0;
    font-family: 'Segoe UI', sans-serif;
}

.project-details-container {
    max-width: 950px;
    margin: 40px auto;
    background: #2a2d3e;
    padding: 35px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.title {
    font-size: 26px;
    margin-bottom: 25px;
    font-weight: 700;
    color: #ffffff;
    border-bottom: 2px solid #3a3f5c;
    padding-bottom: 10px;
}

.card-details p {
    margin-bottom: 10px;
    font-size: 16px;
}

.action-buttons {
    margin: 25px 0;
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 16px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    color: white;
    transition: background 0.3s;
}

.btn-yellow {
    background-color: #f1c40f;
    color: #222;
}

.btn-red {
    background-color: #e74c3c;
}

.btn-green {
    background-color: #27ae60;
}

.btn-gray {
    background-color: #7f8c8d;
}

.btn-dark {
    background-color: #34495e;
}

.btn:hover {
    opacity: 0.9;
}

.sub-title {
    margin-top: 30px;
    font-size: 20px;
    font-weight: bold;
    border-bottom: 1px solid #555;
    padding-bottom: 6px;
}

.sprint-list {
    margin-top: 10px;
    padding-left: 20px;
}

.text-muted {
    color: #bbb;
}

.quick-links {
    margin-top: 15px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.btn-info {
    background-color:  #34495e;
    color: #fff;
    border: none;
    transition: 0.3s ease;
}

.btn-info:hover {
    background-color:  #34495e;
}

</style>
@endsection
