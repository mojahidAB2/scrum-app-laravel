@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Détail de la tâche</h2>

    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">{{ $task->title }}</h4>
            <p class="card-text"><strong>Description :</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Status :</strong> {{ $task->status }}</p>
            <p class="card-text"><strong>Utilisateur assigné :</strong> {{ $task->user->name ?? 'Non assigné' }}</p>
            <p class="card-text"><strong>Sprint :</strong> {{ $task->sprint->name ?? 'Non assigné' }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection 