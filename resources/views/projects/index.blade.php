@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #F9FAFB, #e0e7ff);
    min-height: 100vh;
    color: var(--text-dark);
}

.container {
    max-width: 1120px;
    margin: 2.5rem auto;
    padding: 0 1rem;
}

.title-section {
    background: linear-gradient(to right,  #345af5);
    padding: 1rem 2rem;
    border-radius: 12px 12px 0 0;
    text-align: center;
    color: white;
}
.title-section h1 {
    font-size: 2rem;
    font-weight: bold;
}
.title-section p {
    color: #e5e7eb;
}

/* ➕ Button */
.add-button {
    display: flex;
    justify-content: flex-end;
    margin: 1rem 0;
}
.add-button a {
    background: var(--pink-neon, #F900BF);
    color: white;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s ease;
}
.add-button a:hover {
    background-color: #d100a8;
}

/* 📋 Table */
.table-container {
    overflow-x: auto;
    background: #ffffff;
    padding: 1.5rem;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.07);
    animation: fadeIn 0.6s ease;
}
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
}
.table thead {
    background: #3B82F6;
    color: white;
    text-transform: uppercase;
}
.table th, .table td {
    padding: 0.75rem 1.25rem;
    text-align: left;
    border-bottom: 1px solid #f3f4f6;
}
.table tbody tr:hover {
    background: #f0f9ff;
    transform: scale(1.01);
}

/* 🎯 Buttons */
.action-buttons {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}
.action-buttons a,
.action-buttons button {
    font-size: 0.85rem;
    padding: 0.4rem 0.9rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
}

/* Boutons */
.btn-view {
    background-color: #3B82F6;
    color: white;
}
.btn-view:hover {
    background-color: #2563eb;
}
.btn-edit {
    background-color: #6366F1;
    color: white;
}
.btn-edit:hover {
    background-color: #4f46e5;
}
.btn-delete {
    background-color: #ef4444;
    color: white;
}
.btn-delete:hover {
    background-color: #dc2626;
}

/* 🌀 Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container">

    {{-- 🟪 Titre --}}
    <div class="title-section">
        <h1> Liste des Projets</h1>
    </div>


    {{-- 📋 Tableau --}}
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Scrum Master</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Type de projet</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ Str::limit($project->description, 40) }}</td>
                        <td>{{ $project->scrum_master }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>
                            @switch($project->project_type)
                                @case('site_web') Site Web @break
                                @case('application_mobile') Application Mobile @break
                                @case('data_science') Data Science @break
                                @case('Développement logiciel') Développement logiciel @break
                                @case('Produit numérique') Produit numérique @break
                                @case('Transformation digitale') Transformation digitale @break
                                @case('IA') Intelligence Artificielle @break
                                @case('Projet interne') Projet interne @break
                                @case('autre') Autre @break
                                @default Non spécifié
                            @endswitch
                        </td>
                        <td>
                            <div class="action-buttons">
    <a href="{{ route('projects.show', $project->id) }}" class="btn-view">Voir</a>

    @if(Auth::user()->role !== 'scrum_master')
        <a href="{{ route('projects.edit', $project->id) }}" class="btn-edit">Modifier</a>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Supprimer</button>
        </form>
    @endif
</div>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
