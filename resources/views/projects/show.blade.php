@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 768px;
        margin: 3rem auto;
    }

    .card {
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .title {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: #391e99;
    }

    .label {
        font-weight: 600;
        color: #6b7280;
        margin: 0;
    }

    .value {
        color: #111827;
        margin: 0 0 1rem;
    }

    .member-list {
        list-style-type: disc;
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .btn-back {
        display: inline-block;
        background-color: #f18ac5;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.2s ease;
    }

    .btn-back:hover {
        background-color: #e067a8;
    }
</style>

<div class="container">
    <div class="card">
        <h2 class="title">Détails du Projet</h2>

        <div>
            <p class="label">Nom :</p>
            <p class="value">{{ $project->name }}</p>

            <p class="label">Description :</p>
            <p class="value">{{ $project->description }}</p>

            <p class="label">Date de création :</p>
            <p class="value">{{ $project->created_at->format('d/m/Y') }}</p>
            




             <p class="label">Type de projet :</p>
<p class="value">
    @switch($project->project_type)
        @case('site_web')
            Site Web
            @break
        @case('application_mobile')
            Application Mobile
            @break
        @case('data_science')
            Data Science
            @break
        @case('Développement logiciel')
            Développement logiciel
            @break
        @case('Produit numérique')
            Produit numérique
            @break
        @case('Transformation digitale')
            Transformation digitale
            @break
        @case('Data/IA')
            Intelligence Artificielle
            @break
        @case('Projet interne')
            Projet interne
            @break
        @case('autre')
            Autre
            @break
        @default
            Non spécifié
    @endswitch
</p>



            <p class="label">Membres :</p>
            <ul class="member-list">
                @forelse ($project->members as $member)
                    <li>{{ $member->name }}</li>
                @empty
                    <li>Aucun membre affecté.</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6">
            <a href="{{ route('projects.index') }}" class="btn-back">← Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
