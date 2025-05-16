@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-info fw-bold">📝 Liste des Tâches</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-outline-info mb-4">
        <i class="bi bi-plus-circle"></i> Créer une nouvelle tâche
    </a>

    @foreach ($tasks as $task)
        <div class="card mb-4 shadow bg-dark text-light border border-info">
            <div class="card-header bg-info text-dark fw-bold">
                #{{ $task->id }} — {{ $task->title }}
            </div>

            <div class="card-body">
                <p><i class="bi bi-card-text"></i> <strong>Description :</strong> {{ $task->description }}</p>
                <p><i class="bi bi-check-circle"></i> <strong>Statut :</strong> {{ $task->status }}</p>
                <p><i class="bi bi-person"></i> <strong>Utilisateur :</strong> {{ $task->user->name ?? '-' }}</p>
                <p><i class="bi bi-flag"></i> <strong>Sprint :</strong> {{ $task->sprint->name ?? '-' }}</p>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">
                    ✏️ Modifier
                </a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">🗑️ Supprimer</button>
                </form>
            </div>

            <div class="card-footer bg-secondary text-light">
                <h6 class="fw-bold">💬 Commentaires :</h6>
                @forelse ($task->comments as $comment)
                    <div class="bg-dark border border-light p-2 my-2 rounded">
                        {{ $comment->content }}
                        <small class="text-muted d-block text-end">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                @empty
                    <p class="text-muted">Aucun commentaire pour l’instant.</p>
                @endforelse

                <form action="{{ route('comments.store', ['type' => 'task', 'id' => $task->id]) }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="commentable_type" value="App\\Models\\Task">
                    <input type="hidden" name="commentable_id" value="{{ $task->id }}">

                    <div class="form-group">
                        <textarea name="content" class="form-control bg-dark text-light border border-info" rows="2" placeholder="Ajouter un commentaire..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-outline-light mt-2">
                        💬 Commenter
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
