@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #a044ff, #f18ac5);
        min-height: 100vh;
    }

    .gradient-card {
        background: linear-gradient(135deg, #b36bff, #f18ac5);
        color: white;
        border-radius: 1rem;
        padding: 2rem;
        text-align: center;
        font-weight: bold;
        font-size: 1.1rem;
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 10px 15px rgba(0,0,0,0.2);
    }

    .gradient-card:hover {
        transform: scale(1.03);
        box-shadow: 0 12px 20px rgba(0,0,0,0.3);
    }
</style>

<div class="max-w-6xl mx-auto mt-16 px-6">
    <h1 class="text-center text-3xl font-bold text-white mb-10">Bienvenue Scrum Master</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Voir les projets -->
        <a href="{{ route('projects.index') }}" class="gradient-card">
            Voir les projets
        </a>

        <!-- Gérer les Sprints -->
        <a href="{{ route('sprints.index') }}" class="gradient-card">
            Gérer les Sprints
        </a>

        <!-- Voir User Stories -->
        <a href="{{ route('user_stories.view') }}" class="gradient-card">
            Voir User Stories
        </a>

        <!-- Voir Backlogs -->
        <a href="{{ route('backlogs.view') }}" class="gradient-card">
            Voir Backlogs
        </a>

        <!-- Gérer Équipe -->
        <a href="{{ route('projects.index') }}" class="gradient-card">
            Gérer Équipe
        </a>
    </div>
</div>
@endsection
