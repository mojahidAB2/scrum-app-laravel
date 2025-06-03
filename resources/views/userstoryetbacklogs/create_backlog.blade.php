@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Ajouter un Backlog</h2>

    <form method="POST" action="{{ route('backlogs.store') }}">
        @csrf

        <div class="mb-3">
            <label>Project ID</label>
            <input type="number" name="project_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>User Story liée</label>
            <select name="user_story_id" class="form-control" required>
    <option value="">-- Sélectionner --</option>
    @foreach($userStories as $story)
        <option value="{{ $story->id }}">{{ $story->titre }}</option>
    @endforeach
</select>

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
