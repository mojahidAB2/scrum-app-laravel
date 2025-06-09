@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #fff0f5;
        color: #333;
    }

    .action-card {
        background: linear-gradient(135deg, #7c3aed, #f472b6);
        color: white;
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
</style>

<div class="container mt-5">





    <h1 class="text-center mb-4" style="color: #7c3aed;">Bienvenue Product Owner</h1>
    <p class="text-center text-muted mb-4">Gérez vos projets avec efficacité</p>

    <div class="card-container">

        {{-- 1. Créer un projet --}}
        <a href="{{ route('projects.create') }}" class="action-card">
             Créer un projet
        </a>

        {{-- 2. Voir mes projets --}}
        <a href="{{ route('projects.index') }}" class="action-card">
             Voir mes projets
        </a>

        {{-- 3. Ajouter une User Story --}}
        <a href="{{ route('user_stories.create') }}" class="action-card">
             Ajouter une User Story
        </a>

        {{-- 4. Ajouter un Backlog --}}
      <a href="{{ route('backlogs.create') }}">
           Ajouter un Backlog
        </a>


        {{-- 5. Voir mes Backlogs --}}
        <a href="{{ route('backlogs.view') }}" class="action-card">
             Voir mes Backlogs
        </a>

    </div>
</div>
@endsection
