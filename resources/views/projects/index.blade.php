@extends('layouts.app')

@section('content')
<div class="project-list-container">
    <h2 class="title">Liste des projets</h2>

    <a href="{{ route('projects.create') }}" class="btn-add">Nouveau Projet</a>

    <div class="table-wrapper">
        <table class="project-table">
            <thead>
                <tr>
                    <th>Nom du projet</th>
                    <th>Description</th>
                    <th>Scrum Master</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->scrum_master }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td class="action-btns">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn view">Voir</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn edit">Modifier</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn delete" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
body {
    background-color: #1c1f2e;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    color: #eaeaea;
}

.project-list-container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 30px;
    background-color: #252836;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.title {
    font-size: 26px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 25px;
    border-bottom: 2px solid #3a3f5c;
    padding-bottom: 10px;
}

.btn-add {
    display: inline-block;
    margin-bottom: 20px;
    padding: 10px 18px;
    background-color: #3498db;
    color: white;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.btn-add:hover {
    background-color: #2980b9;
}

.table-wrapper {
    overflow-x: auto;
}

.project-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #2d3144;
    border-radius: 8px;
    overflow: hidden;
}

.project-table thead {
    background-color: #3b3f56;
}

.project-table thead th {
    padding: 14px;
    color: #f2f2f2;
    text-align: left;
    font-size: 15px;
    font-weight: bold;
}

.project-table tbody td {
    padding: 14px;
    border-bottom: 1px solid #44495c;
    font-size: 14px;
}

.project-table tbody tr:hover {
    background-color: #363b52;
    transition: background-color 0.3s ease;
}

.action-btns {
    display: flex;
    gap: 8px;
}

.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: 0.3s ease;
}

.btn.view {
    background-color: #3498db;
    color: white;
}

.btn.edit {
    background-color: #f1c40f;
    color: #222;
}

.btn.delete {
    background-color: #e74c3c;
    color: white;
}

.btn:hover {
    transform: translateY(-1px);
    opacity: 0.9;
}
</style>
@endsection
