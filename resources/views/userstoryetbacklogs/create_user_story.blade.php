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
    color: var(--text-dark);
}

.container {
    max-width: 768px;
    margin: 3rem auto;
    padding: 2.5rem;
    background: linear-gradient(to bottom right, #076aec, #295be4);
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.4s ease;
}

.title {
    font-size: 2rem;
    font-weight: bold;
    color: rgb(247, 162, 4);
    text-align: center;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.25rem;
}

.form-group select,
.form-group input {
    width: 100%;
    padding: 0.65rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    font-size: 1rem;
    transition: 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--blue-main);
    box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
}

.button-submit {
    display: flex;
    justify-content: flex-end;
    margin-top: 1.5rem;
}

.btn-submit {
    background: linear-gradient(to right, var(--blue-main), var(--indigo));
    color: white;
    font-weight: bold;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.btn-submit:hover {
    background: linear-gradient(to right, var(--indigo), var(--blue-main));
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container">
    <h2 class="title">Ajouter une User Story</h2>

    <form method="POST" action="{{ route('user_stories.store') }}">
        @csrf

        <div class="form-group">
            <select name="project_id" required>
                <option value="">Sélectionner un projet</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="text" name="titre" placeholder="Titre de la User Story" required>
        </div>

        <div class="form-group">
            <input type="text" name="en_tant_que" placeholder="En tant que..." required>
        </div>

        <div class="form-group">
            <input type="text" name="je_veux" placeholder="Je veux..." required>
        </div>

        <div class="form-group">
            <input type="text" name="afin_de" placeholder="Afin de..." required>
        </div>

        <div class="button-submit">
            <button type="submit" class="btn-submit">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
