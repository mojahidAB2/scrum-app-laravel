@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #6366F1;
    --bg-light: #F9FAFB;
    --text-dark: #111827;
    --gold: #facc15;
    --pink-neon: #F900BF;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.form-wrapper {
    max-width: 720px;
    margin: 4rem auto;
    background: linear-gradient(to bottom right, var(--blue-main), var(--indigo));
    border-radius: 16px;
    padding: 2.5rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.6s ease-in-out;
}

h2.form-title {
    font-size: 2rem;
    font-weight: bold;
    color: #facc15;
    text-align: center;
    margin-bottom: 2rem;
}

input, select {
    width: 100%;
    background: white;
    border: none;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 8px;
    margin-bottom: 1.2rem;
    transition: all 0.3s ease;
}

input:focus, select:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    border: 1px solid var(--indigo);
}

.btn-submit {
    background: linear-gradient(to right, var(--indigo), var(--blue-main));
    color: white;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

.btn-submit:hover {
    background: linear-gradient(to right, var(--blue-main), var(--indigo));
}
</style>

<div class="form-wrapper">
    <h2 class="form-title">Ajouter un Backlog</h2>

    <form method="POST" action="{{ route('backlogs.store') }}">
        @csrf

        <select name="project_id" required>
            <option value="">Sélectionner un projet</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>

        <input type="text" name="titre" placeholder="Titre du Backlog" required>
        <input type="text" name="description" placeholder="Description du Backlog" required>

        <select name="user_story_id">
            <option value="">Associer à une User Story</option>
            @foreach ($userStories as $story)
                <option value="{{ $story->id }}">{{ $story->titre }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit">Enregistrer</button>
    </form>
</div>
@endsection
