@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}

.page-container {
    max-width: 1200px;
    margin: 4rem auto;
    padding: 2rem;
    background: linear-gradient(to bottom right, #ffd6e0, #ffb3c6, #fbb1ff);
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}

.page-title {
    font-size: 2rem;
    font-weight: bold;
    color: #6A0572;
    margin-bottom: 2rem;
    text-align: center;
}

.alert-warning {
    background-color: #fff3cd;
    border-left: 6px solid #ffc107;
    color: #856404;
    padding: 1rem;
    border-radius: 8px;
    font-size: 1rem;
    text-align: center;
}

.table-wrapper {
    overflow-x: auto;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    background-color: #2e2e2e;
    color: #f3f4f6;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.table-custom thead {
    background-color: #5b21b6;
    text-transform: uppercase;
    font-size: 0.875rem;
}

.table-custom th, .table-custom td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #4b5563;
}

.table-custom tbody tr:hover {
    background-color: #3f3f46;
}

.action-buttons a,
.action-buttons button {
    font-size: 0.875rem;
    padding: 0.4rem 1rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
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
    color: white;
}
.btn-delete:hover {
    background-color: #dc2626;
}

.btn-back {
    margin-top: 2rem;
    display: inline-block;
    background: linear-gradient(to right, #3b82f6, #6366f1);
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    font-weight: bold;
    transition: background 0.3s ease;
}
.btn-back:hover {
    background: linear-gradient(to right, #6366f1, #3b82f6);
}
</style>

<div class="page-container">

    {{-- 🟪 Titre --}}
    <h2 class="page-title">Backlogs du Projet #{{ $projectId }}</h2>

    {{-- 📢 Message si vide --}}
    @if ($backlogs->isEmpty())
        <div class="alert-warning">Aucun backlog n'est associé à ce projet.</div>
    @else
        {{-- 📊 Tableau --}}
        <div class="table-wrapper">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Story</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backlogs as $backlog)
                        <tr>
                            <td>{{ $backlog->id }}</td>
                            <td>{{ $backlog->userStory->titre ?? '-' }}</td>
                            <td>{{ $backlog->titre }}</td>
                            <td>{{ $backlog->description }}</td>
                            <td>
                                <span class="inline-block bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded">
                                    {{ ucfirst($backlog->priorite) }}
                                </span>
                            </td>
                            <td>
                                <span class="inline-block bg-gray-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                    {{ ucfirst($backlog->statut) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="action-buttons" style="display: flex; justify-content: center; gap: 0.5rem;">
                                    <a href="{{ route('backlogs.edit', $backlog->id) }}" class="btn-edit">Modifier</a>
                                    <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}">
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
        <a href="{{ route('projects.show', $projectId) }}" class="btn-back">Retour au projet</a>
    </div>

</div>
@endsection
