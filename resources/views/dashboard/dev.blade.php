@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #640D5F, #D91656);
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
    }

    .container-dev {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .title-page {
        font-size: 32px;
        color: #FFB200;
        margin-bottom: 35px;
        font-weight: bold;
        animation: fadeIn 1s ease-out;
    }

    .card-section {
        background: linear-gradient(to right, #D91656, #FB5000);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.25);
        animation: slideUp 0.8s ease forwards;
        opacity: 0;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .card-header h3 {
        font-size: 20px;
        color: #fff;
        margin: 0;
        font-weight: bold;
    }

    .btn-link {
        background-color: #640D5F;
        color: #fff;
        padding: 10px 18px;
        font-size: 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-link:hover {
        background-color: #3e0440;
        transform: scale(1.05);
    }

    .item-box {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 10px;
        backdrop-filter: blur(2px);
        transition: background 0.3s ease;
    }

    .item-box:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .item-box strong {
        color: #fff;
        font-size: 15px;
    }

    .item-box small {
        color: #FFE5B4;
        font-size: 13px;
    }

    ul.project-list {
        list-style: none;
        padding-left: 0;
    }

    ul.project-list li {
        margin-bottom: 8px;
    }

    ul.project-list li a {
        color: #fff;
        text-decoration: underline;
        font-weight: 500;
    }

    /* Animations */
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<div class="container-dev">
    <h2 class="title-page">Bienvenue Développeur</h2>

    <!-- Projets assignés -->
    <div class="card-section">
        <div class="card-header">
            <h3>Projets Assignés</h3>
            <a href="{{ route('projects.dev.index') }}" class="btn-link">Voir tous les Projets</a>
        </div>
        <ul class="project-list">
            @forelse($projects as $project)
                <li>
                    <a href="{{ route('projects.dev.details', $project->id) }}">{{ $project->name }}</a>
                </li>
            @empty
                <li style="color: #fff;">Aucun projet assigné.</li>
            @endforelse
        </ul>
    </div>

    <!-- Backlogs assignés -->
    <div class="card-section">
        <div class="card-header">
            <h3>Backlogs Assignés</h3>
            <a href="{{ route('backlogs.dev.index') }}" class="btn-link">Voir les Backlogs</a>
        </div>
        @forelse($assignedBacklogs as $backlog)
            <div class="item-box">
                <strong>{{ $backlog->titre }}</strong><br>
                <small>Statut : {{ $backlog->statut }} | Priorité : {{ $backlog->priorite }}</small>
            </div>
        @empty
            <p style="color: #fff;">Aucun backlog assigné.</p>
        @endforelse
    </div>

    <!-- Sprints assignés -->
    <div class="card-section">
        <div class="card-header">
            <h3>Sprints Actifs</h3>
            <a href="{{ route('sprints.dev.index') }}" class="btn-link">Voir les Sprints</a>
        </div>
        @forelse($assignedSprints as $sprint)
            <div class="item-box">
                <strong>{{ $sprint->titre }}</strong><br>
                <small>Statut : {{ $sprint->statut }} | Priorité : {{ $sprint->priorite }}</small>
            </div>
        @empty
            <p style="color: #fff;">Aucun sprint actif.</p>
        @endforelse
    </div>
</div>
@endsection
