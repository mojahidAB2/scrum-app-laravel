@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f6f9fc, #e2ecf3);
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 0 1rem;
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn-back {
        display: inline-block;
        background: #4c51bf;
        color: white;
        font-weight: 600;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        margin-bottom: 30px;
        transition: 0.3s ease;
    }

    .btn-back:hover {
        background: #373ab7;
        transform: scale(1.05);
    }

    .section-box {
        background: white;
        border-left: 5px solid #4c51bf;
        border-radius: 14px;
        padding: 25px 30px;
        margin-bottom: 30px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        color: #333;
        transition: transform 0.3s ease;
    }

    .section-box:hover {
        transform: translateY(-4px);
    }

    .section-title {
        font-size: 1.6rem;
        color: #4c51bf;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title i {
        font-size: 1.2rem;
    }

    .info-line {
        margin-bottom: 10px;
        font-size: 1rem;
        color: #444;
    }

    .info-line strong {
        color: #2d3748;
    }

    ul {
        list-style: disc;
        padding-left: 1.5rem;
        color: #555;
    }

    ul li {
        margin-bottom: 6px;
    }

    .empty-msg {
        color: #999;
        font-style: italic;
    }
</style>

<div class="container">

    {{-- 🔙 Retour --}}
    <a href="{{ route('dashboard.dev') }}" class="btn-back">← Retour</a>

    {{-- ✅ Détails projet --}}
    <div class="section-box">
        <h2 class="section-title"><i class="fas fa-folder-open"></i> Détails du Projet</h2>
        <div class="info-line"><strong>Nom :</strong> {{ $project->name }}</div>
        <div class="info-line"><strong>Description :</strong> {{ $project->description }}</div>
        <div class="info-line"><strong>Scrum Master :</strong> {{ $project->scrum_master }}</div>
        <div class="info-line"><strong>Début :</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</div>
        <div class="info-line"><strong>Fin :</strong> {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</div>
    </div>


   {{-- ✅ User Stories --}}
<div class="section-box">
    <h2 class="section-title"><i class="fas fa-tasks"></i> User Stories Assignées</h2>

    @if($project->userStories && $project->userStories->count())
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: white; border-radius: 10px; overflow: hidden;">
                <thead style="background-color: #4c51bf; color: white;">
                    <tr>
                        <th style="padding: 12px;">Titre</th>
                        <th style="padding: 12px;">En tant que</th>
                        <th style="padding: 12px;">Je veux</th>
                        <th style="padding: 12px;">Afin de</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->userStories as $story)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td>{{ $story->titre }}</td>
                            <td style="padding: 12px;">{{ $story->en_tant_que }}</td>
                            <td style="padding: 12px;">{{ $story->je_veux }}</td>
                            <td style="padding: 12px;">{{ $story->afin_de }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="empty-msg">Aucune user story assignée pour ce projet.</p>
    @endif
</div>



{{-- Optionnel : Font Awesome pour les icônes --}}
<script src="https://kit.fontawesome.com/a2d9f1a9b2.js" crossorigin="anonymous"></script>
@endsection
