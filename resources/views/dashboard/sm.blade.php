@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #EFF6FF, #E0E7FF); /* 💡 Couleurs claires */
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 2rem;
    }

    .welcome-title {
        font-size: 2.3rem;
        font-weight: bold;
        color: #1E3A8A; /* Indigo foncé */
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .welcome-subtitle {
        text-align: center;
        font-size: 1rem;
        color: #475569; /* gris doux */
        margin-bottom: 2.5rem;
    }

    .grid-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .link-button {
        background-color: #3B82F6;
        color: white;
        padding: 1rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .link-button:hover {
        background-color: #2563eb;
        transform: translateY(-3px);
        box-shadow: 0 8px 14px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="dashboard-container">
    <h1 class="welcome-title">Bienvenue Scrum Master</h1>
    <p class="welcome-subtitle">Gérez les sprints et l'équipe Scrum efficacement</p>

    <div class="grid-links">
        <a href="{{ route('projects.index') }}" class="link-button">Voir les projets</a>
        <a href="{{ route('sprints.index') }}" class="link-button">Gérer les Sprints</a>
        <a href="{{ route('user_stories.view') }}" class="link-button">Voir User Stories</a>
        <a href="{{ route('backlogs.view') }}" class="link-button">Voir Backlogs</a>
         <a href="{{ route('scrum.team.manage') }}" class="link-button">Gérer Équipe</a>
    </div>
</div>
@endsection
