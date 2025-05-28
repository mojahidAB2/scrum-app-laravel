@extends('layouts.app')

@section('content')
<style>
.container {
    max-width: 1120px;
    margin: 2.5rem auto;
    padding: 0 1rem;
}

.title-section {
    text-align: center;
    margin-bottom: 2rem;
}

.title-section h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #ba3dd1;
}

.title-section p {
    margin-top: 0.5rem;
    color: #6b7280;
}

.add-button {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 1.5rem;
}

.add-button a {
    background-color: #f18ac5;
    color: white;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.add-button a:hover {
    background-color: #e278af;
}

.table-container {
    overflow-x: auto;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.table thead {
    background-color: #ba3dd1;
    color: white;
    text-transform: uppercase;
}

.table th,
.table td {
    padding: 0.75rem 1.5rem;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: top;
}

.table tbody tr:hover {
    background-color: #f9fafb;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}

.action-buttons a,
.action-buttons button {
    font-size: 0.875rem;
    padding: 0.25rem 0.75rem;
    border: none;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.2s ease;
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
</style>

<div class="container">

    {{-- 🟪 Titre --}}
    <div class="title-section">
        <h1>Liste des Projets</h1>
        <p>Gérez facilement vos projets Scrum</p>
    </div>

    {{-- ➕ Bouton Ajouter --}}
    <div class="add-button">
        <a href="{{ route('projects.create') }}">+ Nouveau Projet</a>
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
                    <th>Type de projet</th> {{-- Colonne ajoutée --}}
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
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn-view">Voir</a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn-edit">Modifier</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                      onsubmit="return confirm('Confirmer la suppression ?')" style="display:inline;">
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
