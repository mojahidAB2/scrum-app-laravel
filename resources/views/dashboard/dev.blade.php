@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1e1e2f;
        color: #fff;
    }

    .custom-card {
        background-color: #2b2c3d;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .section-title {
        color: #ba3dd1;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .task-box, .story-box {
        background-color: #3a3b4f;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 10px;
        color: #fff;
    }
</style>

<div class="container mt-5">
    <h2 class="section-title">Bienvenue Développeur !</h2>
    <p>Voici vos tâches et user stories assignées.</p>

    <!-- Statistiques -->
    <div class="custom-card">
        <h4 class="mb-3">Statistiques générales</h4>
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>Tâches assignées</th>
                    <th>Sprints actifs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tasksCount }}</td>
                    <td>{{ $sprintsActifs }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tâches assignées -->
    <div class="custom-card">
        <h4 class="section-title">📌 Tâches Assignées</h4>
        @forelse($assignedTasks as $task)
            <div class="task-box">
                <strong>{{ $task->title }}</strong><br>
                <small>Statut: {{ $task->status }}</small>
            </div>
        @empty
            <p>Aucune tâche assignée.</p>
        @endforelse
    </div>

    <!-- User Stories assignées -->
    <div class="custom-card">
        <h4 class="section-title">📖 User Stories Assignées</h4>
        @forelse($assignedStories as $story)
            <div class="story-box">
                <strong>{{ $story->title }}</strong><br>
                <small>Priorité: {{ $story->priority }} | Estimation: {{ $story->estimation }} pts</small>
            </div>
        @empty
            <p>Aucune user story assignée.</p>
        @endforelse
    </div>
</div>
@endsection
