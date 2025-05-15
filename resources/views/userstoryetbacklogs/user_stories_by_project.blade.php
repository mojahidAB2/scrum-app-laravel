@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }
    .dashboard-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-top: 40px;
    }
    .dashboard-title {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 25px;
    }
    .table-dark-custom {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .table-dark-custom thead {
        background-color: #374151;
    }
    .table-dark-custom th, .table-dark-custom td {
        padding: 14px 20px;
        text-align: left;
        border-bottom: 1px solid #4b5563;
    }
    .table-dark-custom tr:hover {
        background-color: #2d3748;
    }
    .action-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        color: #fff;
        transition: 0.3s;
    }
    .btn-edit { background-color: #f59e0b; }
    .btn-delete { background-color: #ef4444; }
    .btn-back {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        margin-top: 20px;
        display: inline-block;
        transition: background-color 0.3s;
    }
    .btn-back:hover {
        background-color: #2563eb;
    }
</style>

<div class="container dashboard-container">
    <div class="dashboard-title">User Stories du Projet #{{ $projectId }}</div>

    @if ($stories->isEmpty())
        <div class="alert alert-warning text-dark">Aucune User Story trouvée pour ce projet.</div>
    @else
        <table class="table-dark-custom">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>En tant que</th>
                    <th>Je veux</th>
                    <th>Afin de</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $story)
                <tr>
                    <td>{{ $story->titre }}</td>
                    <td>{{ $story->en_tant_que }}</td>
                    <td>{{ $story->je_veux }}</td>
                    <td>{{ $story->afin_de }}</td>
                    <td>
                        <a href="{{ route('user_stories.edit', $story->id) }}" class="action-btn btn-edit">Modifier</a>
                        <form action="{{ route('user_stories.destroy', $story->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="action-btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('projects.show', $projectId) }}" class="btn-back">Retour au projet</a>
</div>
@endsection
