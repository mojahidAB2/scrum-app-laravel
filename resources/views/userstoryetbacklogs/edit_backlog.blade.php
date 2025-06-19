@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #1b1ef2;
    --bg-light: #c2d0df;
    --text-dark: #111827;
    --gold: #facc15;
    --pink-neon: #F900BF;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
}

.page-container {
    max-width: 700px;
    margin: 3rem auto;
    padding: 2rem;
    background-color: white;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    animation: fadeIn 0.5s ease;
}

.page-title {
    font-size: 1.75rem;
    font-weight: bold;
    color: var(--indigo);
    text-align: center;
    margin-bottom: 2rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #374151;
}

input, select {
    width: 100%;
    padding: 0.6rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    margin-bottom: 1.25rem;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input:focus, select:focus {
    border-color: var(--blue-main);
    box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
    outline: none;
}

/* Buttons */
.btn-group {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

.btn-primary {
    background-color: var(--indigo);
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
    border: none;
}
.btn-primary:hover {
    background-color: var(--blue-main);
}

.btn-secondary {
    background-color: #3b72e0;
    color: #111827;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
}
.btn-secondary:hover {
    background-color: #d1d5db;
}

/* Fade animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="page-container">
    <h2 class="page-title">Modifier un Backlog</h2>

    <form method="POST" action="{{ route('backlogs.update', $backlog->id) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="project_id" value="{{ $backlog->project_id }}">

        <div>
            <label for="titre">Titre</label>
            <input type="text" name="titre" value="{{ $backlog->titre }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $backlog->description }}" required>
        </div>

        <div>
            <label for="user_story_id">Associer à une User Story</label>
            <select name="user_story_id">
                <option value="">Aucune</option>
                @foreach ($userStories as $story)
                    <option value="{{ $story->id }}" {{ $backlog->user_story_id == $story->id ? 'selected' : '' }}>
                        {{ $story->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="btn-group mt-4">
            <a href="{{ route('backlogs.view') }}" class="btn-secondary"> Retour</a>
            <button type="submit" class="btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
