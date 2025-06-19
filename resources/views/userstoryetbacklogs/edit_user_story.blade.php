@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #6366F1;
    --bg-light: #dbe6f1;
    --text-dark: #111827;
    --gold: #facc15;
    --pink-neon: #F900BF;
}

body {
    background: linear-gradient(to right,  --bg-light);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    color: var(--text-dark);
}

/* Animation */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.form-wrapper {
    max-width: 720px;
    margin: 4rem auto;
    background: white;
    padding: 2.5rem;
    border-radius: 14px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    animation: fadeInUp 0.5s ease;
}

h2.title {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    color: darkblue;
    margin-bottom: 2rem;
}

/* Form elements */
label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #31363f;
}

input {
    width: 100%;
    padding: 0.65rem 1rem;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    margin-bottom: 1.25rem;
    font-size: 0.95rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input:focus {
    border-color: var(--blue-main);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    outline: none;
}

input[disabled] {
    background-color: #f3f4f6;
    color: #6b7280;
    cursor: not-allowed;
}

/* Buttons */
.btn-secondary {
    background-color: #f3f4f6;
    color: #111827;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    margin-right: 1rem;
    font-weight: 500;
    transition: background 0.2s ease;
}
.btn-secondary:hover {
    background-color: #e5e7eb;
}

.btn-primary {
    background-color: var(--blue-main);
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: background 0.3s ease, transform 0.2s ease;
}
.btn-primary:hover {
    background-color: var(--indigo);
    transform: scale(1.03);
}
</style>

<div class="form-wrapper">
    <h2 class="title">Modifier la User Story</h2>

    <form method="POST" action="{{ route('user_stories.update', $story->id) }}">
        @csrf
        @method('PUT')

        <label>Projet</label>
        <input type="text" value="{{ $story->project->name ?? 'Projet inconnu' }}" disabled>
        <input type="hidden" name="project_id" value="{{ $story->project_id }}">

        <label>Titre</label>
        <input type="text" name="titre" value="{{ $story->titre }}" required>

        <label>En tant que</label>
        <input type="text" name="en_tant_que" value="{{ $story->en_tant_que }}" required>

        <label>Je veux</label>
        <input type="text" name="je_veux" value="{{ $story->je_veux }}" required>

        <label>Afin de</label>
        <input type="text" name="afin_de" value="{{ $story->afin_de }}" required>

        <div class="flex justify-end mt-6">
            <a href="{{ route('user_stories.view') }}" class="btn-secondary">Retour</a>
            <button type="submit" class="btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
