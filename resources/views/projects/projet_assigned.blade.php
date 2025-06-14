@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #FF8383, #FFF574, #A1D6CB, #A19AD3);
        background-size: 400% 400%;
        animation: pastelFlow 12s ease infinite;
    }

    @keyframes pastelFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .container {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 1rem;
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(15px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .page-title {
        font-size: 2.2rem;
        font-weight: bold;
        color: #7c3aed;
        text-align: center;
        margin-bottom: 2rem;
    }

    .project-box {
        background: rgba(255, 255, 255, 0.2);
        border-left: 6px solid #FF8383;
        border-radius: 14px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        color: #333;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .project-box:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.35);
    }

    .project-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #FF8383;
        margin-bottom: 10px;
    }

    .project-description {
        font-size: 0.95rem;
        color: #444;
        margin-bottom: 10px;
    }

    .project-info {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 15px;
    }

    .btn-details {
        background: #FFF574;
        color: #333;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-details:hover {
        background: #A1D6CB;
        color: #000;
    }
</style>

<div class="container">
    <h2 class="page-title"> Mes Projets Assignés</h2>

    @if(count($projects))
        @foreach($projects as $project)
            <div class="project-box">
                <div class="project-title">{{ $project->name }}</div>
                <div class="project-description">{{ Str::limit($project->description, 100) }}</div>
                <div class="project-info">
                    <strong>Scrum Master:</strong> {{ $project->scrum_master }}<br>
                    <strong>Début:</strong> {{ $project->start_date }} |
                    <strong>Fin:</strong> {{ $project->end_date }}
                </div>
                <a href="{{ route('projects.dev.details', $project->id) }}" class="btn-details">👁 Voir Détails</a>
            </div>
        @endforeach
    @else
        <p style="text-align:center; color:#222;">Aucun projet assigné pour le moment.</p>
    @endif
</div>
@endsection
