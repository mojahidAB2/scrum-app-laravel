@extends('layouts.app')

@section('content')
<style>
    body {
        /* Dégradé d’arrière-plan général */
        background: linear-gradient(to bottom right, #733391, #357C3C, #EF6D6D, #FFE6AB);
        background-attachment: fixed;
        background-size: 200% 200%;
        animation: gradientShift 10s ease infinite;
        color: #333;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .title-main {
        color: #fff;
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        margin-top: 30px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .subtitle {
        color: #FFE6AB;
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 40px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        padding: 0 20px;
    }

    .action-card {
        background: linear-gradient(135deg, #733391, #EF6D6D);
        color: white;
        padding: 25px;
        border-radius: 16px;
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }

    .action-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.3);
    }
</style>

<div class="container text-center mt-5">
    <h1 class="title-main">Bienvenue Product Owner</h1>
    <p class="subtitle">Gérez vos projets avec efficacité</p>

    <div class="card-container mt-4">
        <!-- Créer un projet -->
        <a href="{{ route('projects.create') }}" class="action-card">
            Créer un projet
        </a>

        <!-- Voir mes projets -->
        <a href="{{ route('projects.index') }}" class="action-card">
            Voir mes projets
        </a>

        <!-- Ajouter une User Story -->
        <a href="{{ route('user_stories.create') }}" class="action-card">
            Ajouter une User Story
        </a>

        <!-- Ajouter un Backlog -->
        <a href="{{ route('backlogs.create', 1) }}" class="action-card">
            Ajouter un Backlog
        </a>
    </div>
</div>
@endsection
