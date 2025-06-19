@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #F9FAFB;
        color: #111827;
    }

    .title-main {
        color: #3B82F6;
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        margin-top: 30px;
    }

    .subtitle {
        color: #6366F1;
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 40px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        padding: 0 20px;
        margin-bottom: 50px;
    }

    .action-card {
        background-color: #3B82F6;
        color: white;
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        font-weight: bold;
        font-size: 1.1rem;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        box-shadow: 0 6px 15px rgba(59, 130, 246, 0.2);
        text-decoration: none;
    }

    .action-card:hover {
        background-color: #2563eb;
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }
</style>

<div class="container text-center mt-5">
    <h1 class="title-main">Bienvenue Product Owner</h1>
    <p class="subtitle">Gérez vos projets avec efficacité</p>

    <div class="card-container mt-4">
        <a href="{{ route('projects.create') }}" class="action-card">Créer un projet</a>
        <a href="{{ route('projects.index') }}" class="action-card">Voir mes projets</a>
        <a href="{{ route('user_stories.create') }}" class="action-card">Ajouter une User Story</a>
        <a href="{{ route('backlogs.create', 1) }}" class="action-card">Ajouter un Backlog</a>
        <a href="{{ route('sprints.po') }}" class="action-card">Voir tous les Sprints</a>
    </div>
</div>
@endsection
