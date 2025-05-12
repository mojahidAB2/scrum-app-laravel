@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Modifier la tâche</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="à faire" {{ $task->status == 'à faire' ? 'selected' : '' }}>À faire</option>
                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Utilisateur assigné</label>
            <select name="user_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Sprint</label>
            <select name="sprint_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($sprints as $sprint)
                    <option value="{{ $sprint->id }}" {{ $task->sprint_id == $sprint->id ? 'selected' : '' }}>
                        {{ $sprint->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
