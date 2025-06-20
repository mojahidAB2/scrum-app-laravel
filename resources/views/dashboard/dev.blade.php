@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #e0f2ff, #ffffff);
        font-family: 'Segoe UI', sans-serif;
    }

    .container-dev {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
        text-align: center;
    }

    h2.title {
        font-size: 2.2rem;
        font-weight: bold;
        color: #1e3a8a;
        margin-bottom: 10px;
    }

    p.subtitle {
        color: #475569;
        font-size: 1rem;
        margin-bottom: 30px;
    }

    .grid-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .btn-dash {
        background-color: #3b82f6;
        color: white;
        padding: 16px;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .btn-dash:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
    }
</style>

<div class="container-dev">
    <h2 class="title">Bienvenue Développeur</h2>
    <p class="subtitle">Accédez à vos projets, backlogs et sprints assignés facilement</p>

    <div class="grid-buttons">
        <a href="{{ route('projects.dev.index') }}" class="btn-dash">Voir les projets</a>
        <a href="{{ route('sprints.dev.index') }}" class="btn-dash">Voir les Sprints</a>
        <a href="{{ route('backlogs.dev.index') }}" class="btn-dash">Voir les Backlogs</a>
        <a href="{{ route('developer.backlogs.assigned') }}" class="btn-dash">Voir les Backlogs assignés</a>

    </div>
</div>
@endsection
