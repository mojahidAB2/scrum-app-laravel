
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

<div class="container mt-28">

    <!-- Message d’accueil -->
    <h1 class="text-xl font-bold text-[#ba3dd1] mb-3">Bienvenue Scrum Master</h1>
   


    <!-- Section statistiques -->
    <div class="custom-card mt-5">
        <h4 class="mb-3">Statistiques générales</h4>
        <table class="table table-dark table-hover text-center">
            <thead>
                <tr>
                    <th>Projets</th>
                    <th>Tâches assignées</th>
                    <th>Sprints actifs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $projectsCount }}</td>
                    <td>{{ $tasksCount }}</td>
                    <td>{{ $sprintsActifs }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Actions rapides -->
    <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">

        <div class="text-end">
            <!-- Projets -->
            <a href="{{ route('projects.index') }}" class="btn btn-outline-light me-2 mb-2">
    📁 Voir mes projets
</a>

            <!-- Sprints -->
            <a href="{{ route('sprints.index') }}" class="btn btn-outline-success me-2 mb-2">
                📅 Gérer les Sprints
            </a>

            <!-- User Stories -->
            <a href="{{ route('user_stories.view') }}" class="btn btn-outline-warning me-2 mb-2">
                📖 Voir User Stories
            </a>

            <!-- Backlogs -->
            <a href="{{ route('backlogs.view') }}" class="btn btn-outline-primary me-2 mb-2">
                📋 Voir Backlogs
            </a>

            <!-- Gérer équipe -->
            <a href="{{ route('projects.index') }}" class="btn btn-outline-light me-2 mb-2">
                👥 Gérer Équipe
            </a>
        </div>

    </div>
</div>
@endsection
