@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Créer une tâche</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="à faire">À faire</option>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Utilisateur assigné</label>
            <select name="user_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Sprint</label>
            <select name="sprint_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($sprints as $sprint)
                    <option value="{{ $sprint->id }}">{{ $sprint->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
