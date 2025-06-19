@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #2228d7;
    --bg-light: #F9FAFB;
    --text-dark: #111827;
    --gold: #facc15;
    --pink-neon: #97022f;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
    font-family: 'Segoe UI', sans-serif;
}

.page-container {
    max-width: 1200px;
    margin: 3rem auto;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.06);
}

.page-title {
    font-size: 2rem;
    font-weight: bold;
    color: var(--indigo);
    margin-bottom: 2rem;
    text-align: center;
}

/* ⚠️ Alerte vide */
.alert-warning {
    background-color: #fff8e1;
    border-left: 5px solid var(--gold);
    color: #8a6d3b;
    padding: 1rem;
    border-radius: 8px;
    font-size: 1rem;
    text-align: center;
}

/* 📋 Tableau */
.table-wrapper {
    overflow-x: auto;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
    border-radius: 8px;
    overflow: hidden;
    background-color: rgb(33, 108, 247);
}

.table-custom thead {
    background-color: var(--indigo);
    color: white;
    text-transform: uppercase;
}

.table-custom th, .table-custom td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

.table-custom tbody tr:hover {
    background-color: #f1f5f9;
}

/* 🟨 Modifier */
.btn-edit {
    background-color: var(--gold);
    color: var(--text-dark);
}
.btn-edit:hover {
    background-color: #eab308;
}

/* 🟪 Supprimer */
.btn-delete {
    background-color: var(--pink-neon);
    color: white;
}
.btn-delete:hover {
    background-color: #f10505;
}

/* 🎯 Boutons généraux */
.action-buttons a,
.action-buttons button {
    font-size: 0.85rem;
    padding: 0.45rem 1rem;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: background 0.3s ease;
    text-decoration: none;
}

/* 🔙 Bouton retour */
.btn-back {
    display: inline-block;
    background: linear-gradient(to right, var(--blue-main), var(--indigo));
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    font-weight: bold;
    margin-top: 2rem;
    transition: 0.3s ease;
}
.btn-back:hover {
    background: linear-gradient(to right, var(--indigo), var(--blue-main));
}

@keyframes fadeSlideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.page-container {
  animation: fadeSlideUp 0.7s ease-out both;
}

</style>


<div class="page-container">

    {{-- 🟪 Titre --}}
    <h2 class="page-title">User Stories du Projet : {{ $project->name }}</h2>


    {{-- 📢 Message si vide --}}
    @if ($stories->isEmpty())
        <div class="alert-warning">Aucune User Story trouvée pour ce projet.</div>
    @else
        {{-- 📊 Tableau --}}
        <div class="table-wrapper">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>En tant que</th>
                        <th>Je veux</th>
                        <th>Afin de</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stories as $story)
                        <tr>
                            <td>{{ $story->titre }}</td>
                            <td>{{ $story->en_tant_que }}</td>
                            <td>{{ $story->je_veux }}</td>
                            <td>{{ $story->afin_de }}</td>
                            <td class="text-center">
                                <div class="action-buttons" style="display: flex; justify-content: center; gap: 0.5rem;">
                                    <a href="{{ route('user_stories.edit', $story->id) }}" class="btn-edit">Modifier</a>
                                    <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn-delete">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- 🔙 Retour --}}
    <div class="text-center">
        <a href="{{ route('projects.show', $projectId) }}" class="btn-back">Retour</a>
    </div>

</div>
@endsection
