@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #2144f3fe;
    --bg-light: #F9FAFB;
    --text-dark: #111827;
    --gold: #facc15;
    --red: #dc2626;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
}

.page-container {
    max-width: 1200px;
    margin: 4rem auto;
    padding: 2rem;
    background-color: rgb(195, 200, 211);
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    animation: fadeIn 0.5s ease;
}

.page-title {
    font-size: 2rem;
    font-weight: bold;
    color: var(--indigo);
    text-align: center;
    margin-bottom: 2rem;
}

.table-wrapper {
    overflow-x: auto;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    font-size: 0.95rem;
}

.table-custom thead {
    background-color: var(--indigo);
    color: white;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.table-custom th,
.table-custom td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #1d62ec;
}

.table-custom tr:hover {
    background-color: #f3f4f6;
}

/* 🎯 Actions */
.actions a,
.actions button {
    font-size: 0.85rem;
    padding: 0.45rem 1rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s ease;
}

/* Modifier */
.btn-edit {
    background-color: var(--gold);
    color: var(--text-dark);
}
.btn-edit:hover {
    background-color: #eab308;
}

/* Supprimer */
.btn-delete {
    background-color: var(--red);
    color: white;
}
.btn-delete:hover {
    background-color: #b91c1c;
}

/* Retour */
.btn-back {
    margin-top: 2rem;
    display: inline-block;
    background-color: var(--indigo);
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    font-weight: bold;
    transition: background-color 0.2s ease;
    text-decoration: none;
}
.btn-back:hover {
    background-color: var(--blue-main);
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="page-container">
    <h2 class="page-title">Backlogs du Projet : {{ $project->name }}</h2>

    <div class="table-wrapper">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>User Story</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($backlogs as $backlog)
                    <tr>
                        <td>{{ $backlog->userStory->titre ?? '-' }}</td>
                        <td>{{ $backlog->titre }}</td>
                        <td>{{ $backlog->description }}</td>
                        <td class="text-center">
                            <div class="actions" style="display: flex; justify-content: center; gap: 0.5rem;">
                                <a href="{{ route('backlogs.edit', $backlog->id) }}" class="btn-edit">Modifier</a>
                                <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer ce backlog ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">Aucun backlog trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center">
        <a href="{{ route('projects.show', $project->id) }}" class="btn-back">← Retour au projet</a>
    </div>
</div>
@endsection
