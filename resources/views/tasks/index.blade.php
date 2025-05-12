@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-orange">Liste des Tâches</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-4">Créer une nouvelle tâche</a>

    <table class="table table-bordered table-striped shadow">
        <thead class="bg-warning text-white">
            <tr class="text-center">
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Status</th>
                <th>Utilisateur</th>
                <th>Sprint</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="text-center align-middle">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->user->name ?? 'Non assignée' }}</td>
                    <td>{{ $task->sprint->name ?? 'Non assignée' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <h5 class="mb-2">Commentaires :</h5>
                        @if($task->comments && $task->comments->count())
                            @foreach($task->comments as $comment)
                                <div class="mb-2">
                                    <strong>{{ $comment->user->name }} :</strong>
                                    {{ $comment->content }}
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        @else
                            <p>Aucun commentaire pour l’instant.</p>
                        @endif

                        <form action="{{ route('comments.store', ['type' => 'task', 'id' => $task->id]) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group mb-2">
                                <textarea name="content" rows="2" class="form-control" placeholder="Ajouter un commentaire..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">Commenter</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucune tâche trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .text-orange { color: #fb8c00; }
</style>
@endsection
