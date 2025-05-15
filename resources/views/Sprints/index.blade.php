@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }

    .sprint-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-top: 40px;
    }

    .sprint-title {
        font-size: 28px;
        font-weight: bold;
        color: #fbbf24;
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
        text-align: center;
        border-bottom: 1px solid #4b5563;
    }

    .table-dark-custom tr:hover {
        background-color: #2d3748;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .action-btn {
        padding: 6px 14px;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        color: #fff;
        transition: 0.3s;
        font-size: 14px;
    }

    .btn-edit { background-color: #f59e0b; }
    .btn-delete { background-color: #ef4444; }
    .btn-add {
        background-color: #10b981;
        color: white;
        padding: 10px 20px;
        font-weight: 500;
        border-radius: 6px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-add:hover {
        background-color: #059669;
    }

    .btn-add-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

</style>

<div class="container sprint-container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="sprint-title">Liste des Sprints</div>

        @php
            $firstProjectId = $sprints->first()?->projet->id ?? null;
        @endphp

        @if($firstProjectId)
            <a href="{{ route('sprints.create', ['project' => $firstProjectId]) }}" class="btn-add">Ajouter un Sprint</a>
        @endif
    </div>

    @if ($sprints->isEmpty())
        <div class="alert alert-warning text-dark bg-light mt-4">Aucun sprint disponible pour l’instant.</div>
    @else
        <table class="table-dark-custom mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Projet</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sprints as $sprint)
                    <tr>
                        <td>{{ $sprint->id }}</td>
                        <td>{{ $sprint->name }}</td>
                        <td>{{ $sprint->projet->name ?? 'Non défini' }}</td>
                        <td>{{ $sprint->start_date }}</td>
                        <td>{{ $sprint->end_date }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('sprints.edit', $sprint->id) }}" class="action-btn btn-edit">Modifier</a>
                                <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
