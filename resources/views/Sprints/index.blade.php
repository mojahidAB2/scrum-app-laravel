@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="text-orange fs-3 fw-bold">
             Liste des Sprints
        </h2>

        @php
            $firstProjectId = $sprints->first()?->projet->id ?? null;
        @endphp

        @if($firstProjectId)
            <a href="{{ route('sprints.create', ['project' => $firstProjectId]) }}" class="btn btn-success">
                + Ajouter un Sprint
            </a>
        @else
            <div class="alert alert-warning">Aucun projet disponible pour créer un Sprint.</div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow" style="border: 2px solid #ffa726;">
            <thead style="background-color: #ffe0b2;">
                <tr class="text-center fw-semibold" style="font-size: 16px;">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Projet</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody style="font-size: 15px;">
                @forelse($sprints as $sprint)
                <tr class="text-center align-middle">
                    <td>{{ $sprint->id }}</td>
                    <td>{{ $sprint->name }}</td>
                    <td>{{ $sprint->projet->name ?? 'Non défini' }}</td>
                    <td>{{ $sprint->start_date }}</td>
                    <td>{{ $sprint->end_date }}</td>
                    <td>
                        <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn btn-warning btn-sm me-1">✏️</a>
                        <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4 fs-5">Aucun sprint disponible.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .text-orange {
        color: #fb8c00;
    }
</style>
@endsection
