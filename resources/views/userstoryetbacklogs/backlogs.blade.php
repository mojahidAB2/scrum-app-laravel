@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
        min-height: 100vh;
    }

    .table-card {
        background: linear-gradient(to bottom right, #fbe4f1, #f6d0eb, #f0c3e3);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
        padding: 2rem;
    }

    .title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #6A0572;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 1rem;
        overflow: hidden;
    }

    th {
        background-color: #ba3dd1;
        color: white;
        text-transform: uppercase;
        padding: 0.75rem;
        font-size: 0.9rem;
    }

    td {
        padding: 0.75rem;
        font-size: 0.875rem;
    }

    tr:nth-child(even) {
        background-color: #f9f5ff;
    }

    tr:hover {
        background-color: #f3e8ff;
    }

    .btn-edit {
        background-color: #facc15;
        color: black;
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
    }

    .btn-edit:hover {
        background-color: #eab308;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }
</style>

<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="title"> Liste des Backlogs</h2>

    <div class="table-card mt-6 overflow-x-auto">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Projet</th>
                    <th>User Story</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($backlogs as $backlog)
                    <tr>
                        <td>{{ $backlog->id }}</td>
                        <td>{{ $backlog->project->name ?? 'Projet inconnu' }}</td>
                        <td>{{ $backlog->userStory->titre ?? '—' }}</td>
                        <td>{{ $backlog->titre }}</td>
                        <td>{{ $backlog->description }}</td>
                        <td>
                            <a href="{{ route('backlogs.edit', $backlog->id) }}" class="btn-edit">Modifier</a>
                            <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}" class="inline-block"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce backlog ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
