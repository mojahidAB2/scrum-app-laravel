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
        max-width: 1000px;
        margin: 60px auto;
        padding: 0 1rem;
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn-back {
        display: inline-block;
        background: linear-gradient(to right, #FF8383, #FFF574);
        color: #333;
        font-weight: 600;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        margin-bottom: 25px;
        transition: 0.3s ease;
    }

    .btn-back:hover {
        background: linear-gradient(to right, #A1D6CB, #A19AD3);
        color: #000;
    }

    .section-box {
        background: rgba(255, 255, 255, 0.2);
        border-left: 6px solid #FF8383;
        border-radius: 14px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        color: #333;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .section-box:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.3);
    }

    .section-title {
        font-size: 1.5rem;
        color: #7E1891;
        margin-bottom: 15px;
        border-bottom: 2px solid #E73879;
        padding-bottom: 5px;
    }

    ul {
        list-style: disc;
        padding-left: 1.5rem;
        color: #444;
    }
</style>

<div class="container">

    {{-- 🔙 Retour --}}
    <a href="{{ route('dashboard.dev') }}" class="btn-back">← Retour</a>

    {{-- ✅ Détails projet --}}
    <div class="section-box">
        <h2 class="section-title"> Détails du Projet</h2>
        <p><strong>Nom :</strong> {{ $project->name }}</p>
        <p><strong>Description :</strong> {{ $project->description }}</p>
        <p><strong>Scrum Master :</strong> {{ $project->scrum_master }}</p>
        <p><strong>Début :</strong> {{ $project->start_date }}</p>
        <p><strong>Fin :</strong> {{ $project->end_date }}</p>
    </div>

    {{-- ✅ User Stories --}}
    <div class="section-box">
        <h2 class="section-title"> User Stories Assignées</h2>
        @php
            $userStories = $project->userStories ?? [];
        @endphp

        @if($userStories && count($userStories))
            <ul>
                @foreach($userStories as $story)
                    <li><strong>{{ $story->title }}</strong> – {{ $story->priority }} – {{ $story->status }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucune user story assignée pour ce projet.</p>
        @endif
    </div>

</div>
@endsection
