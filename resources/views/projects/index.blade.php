@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}

.container {
    max-width: 1120px;
    margin: 2.5rem auto;
    padding: 0 1rem;
}

/* 🎨 Header */
.title-section {
    background: linear-gradient(to right, #fbb1ff, #f18ac5);
    padding: 1rem 2rem;
    border-radius: 12px 12px 0 0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    text-align: center;
    margin-bottom: 0;
}
.title-section h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #6A0572;
}
.title-section p {
    color: #4b5563;
    font-size: 0.95rem;
}

/* ➕ Button */
.add-button {
    display: flex;
    justify-content: flex-end;
    margin: 1rem 0;
}
.add-button a {
    background: linear-gradient(to right, #f18ac5, #ba3dd1);
    color: white;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s ease;
}
.add-button a:hover {
    background: linear-gradient(to right, #ba3dd1, #f18ac5);
}

/* 📋 Table Style */
.table-container {
    overflow-x: auto;
    background: linear-gradient(to bottom right, #fbb1ff, #f18ac5, #ffd6e0);
    padding: 1.5rem;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.07);
    animation: fadeIn 0.6s ease;
}
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
}
.table thead {
    background: #ba3dd1;
    color: white;
    text-transform: uppercase;
}
.table th, .table td {
    padding: 0.75rem 1.25rem;
    text-align: left;
    border-bottom: 1px solid #f3f4f6;
}
.table tbody tr {
    transition: all 0.25s ease;
}
.table tbody tr:hover {
    background: #fdf2f8;
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
    padding: 0.3rem 0.75rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    color: white;
    cursor: pointer;
    transition: 0.2s ease;
    text-decoration: none;
}
.btn-view {
    background-color: #3b82f6;
}
.btn-view:hover {
    background-color: #2563eb;
}
.btn-edit {
    background-color: #facc15;
    color: black;
}
.btn-edit:hover {
    background-color: #eab308;
}
.btn-delete {
    background-color: #ef4444;
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
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn-edit">Modifier</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
