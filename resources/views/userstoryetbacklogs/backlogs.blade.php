@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #3B82F6, #6366F1);
        min-height: 100vh;
    }

    .page-container {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .page-title {
        font-size: 2rem;
        font-weight: bold;
        color: #4F46E5;
        margin-bottom: 2rem;
        text-align: center;
    }

    .table-custom {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-custom th {
        background-color: #6366F1;
        color: white;
        padding: 1rem;
        text-align: left;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .table-custom td {
        padding: 0.9rem 1rem;
        border-bottom: 1px solid #e5e7eb;
        font-size: 0.95rem;
    }

    .table-custom tr:hover {
        background-color: #f9fafb;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-view {
        background-color: #3B82F6;
        color: white;
        padding: 0.4rem 0.9rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #facc15;
        color: black;
        padding: 0.4rem 0.9rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        padding: 0.4rem 0.9rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }
</style>

<div class="page-container">
    <h2 class="page-title">Liste des Backlogs</h2>

    <table class="table-custom">
        <thead>
    <tr>
        <th>PROJET</th>
        <th>USER STORY</th>
        <th>TITRE</th>
        <th>DESCRIPTION</th>

        @if(Auth::user()->role !== 'scrum_master')
            <th>ACTIONS</th>
        @endif
    </tr>
</thead>
<tbody>
    @foreach($backlogs as $backlog)
        <tr>
            <td>{{ $backlog->project->name ?? '-' }}</td>
            <td>{{ $backlog->userStory->titre ?? '—' }}</td>
            <td>{{ $backlog->titre }}</td>
            <td>{{ $backlog->description }}</td>

            @if(Auth::user()->role !== 'scrum_master')
            <td>
                <div class="action-buttons">
                    <a href="{{ route('backlogs.edit', $backlog->id) }}" class="btn-edit">Modifier</a>
                    <form action="{{ route('backlogs.destroy', $backlog->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                </div>
            </td>
            @endif
        </tr>
    @endforeach
</tbody>
    </table>
</div>
@endsection
