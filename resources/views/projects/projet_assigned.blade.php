@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f4f6fa;
        font-family: 'Segoe UI', sans-serif;
    }

    .project-container {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 1rem;
    }

    .project-title {
        text-align: center;
        font-size: 2.3rem;
        font-weight: bold;
        color: #4c51bf;
        margin-bottom: 40px;
    }

    .project-card {
        background: white;
        border-radius: 14px;
        padding: 24px 30px;
        margin-bottom: 30px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .project-name {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 10px;
    }

    .project-description {
        color: #555;
        font-size: 1rem;
        margin-bottom: 16px;
    }

    .project-meta {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 18px;
    }

    .project-meta strong {
        color: #4c51bf;
    }

    .project-button {
        display: inline-block;
        background: #4c51bf;
        color: white;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .project-button:hover {
        background: #3b3fc0;
    }

    .no-project {
        text-align: center;
        color: #999;
        font-size: 1.1rem;
        margin-top: 60px;
    }
</style>

<div class="project-container">
    <h2 class="project-title">Mes Projets Assignés</h2>

    @if(count($projects))
        @foreach($projects as $project)
            <div class="project-card">
                <div class="project-name">{{ $project->name }}</div>
                <div class="project-description">
                    {{ Str::limit($project->description, 120) }}
                </div>
                <div class="project-meta">
                    <strong>Scrum Master:</strong> {{ $project->scrum_master }} <br>
                    <strong>Début:</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} |
                    <strong>Fin:</strong> {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                </div>
                <a href="{{ route('projects.dev.details', $project->id) }}" class="project-button">👁 Voir Détails</a>
            </div>
        @endforeach
    @else
        <div class="no-project">Aucun projet assigné pour le moment.</div>
    @endif
</div>
@endsection
