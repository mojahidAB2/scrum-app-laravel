@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #a044ff, #f18ac5);
        min-height: 100vh;
    }

    .form-container {
        background: linear-gradient(to bottom right, #fbe4f1, #f6d0eb, #f0c3e3);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
        padding: 2rem;
        max-width: 700px;
        margin: auto;
    }

    h2.title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #6A0572;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    label {
        font-weight: 500;
        color: #4b5563;
    }

    input, select {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        padding: 0.5rem 0.75rem;
        width: 100%;
        margin-top: 0.25rem;
    }

    input:focus, select:focus {
        border-color: #ba3dd1;
        box-shadow: 0 0 0 3px rgba(186, 61, 209, 0.3);
        outline: none;
    }

    .btn-primary {
        background-color: #ba3dd1;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #9c2bbf;
    }

    .btn-secondary {
        background-color: #f3f4f6;
        color: #333;
        padding: 0.5rem 1.5rem;
        border-radius: 8px;
    }

    .btn-secondary:hover {
        background-color: #e5e7eb;
    }
</style>

<div class="py-10 px-6">
    <div class="form-container">
        <h2 class="title">Ajouter un Backlog</h2>

        <form method="POST" action="{{ route('backlogs.store') }}">
            @csrf

            {{-- 🔹 Nom du projet (affiché en readonly) --}}
            <div class="mb-4">
    <label for="project_id">Projet</label>
    <select name="project_id" required>
        <option value="">-- Sélectionner un projet --</option>
        @foreach ($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
    </select>
</div>

            {{-- 🔹 Titre --}}
            <div class="mb-4">
                <label>Titre</label>
                <input type="text" name="titre" required>
            </div>

            {{-- 🔹 Description --}}
            <div class="mb-4">
                <label>Description</label>
                <input type="text" name="description" required>
            </div>

            {{-- 🔹 User Story --}}
            <div class="mb-4">
                <label>Associer à une User Story</label>
                <select name="user_story_id">
                    <option value="">-- Aucune --</option>
                    @foreach ($userStories as $story)
                        <option value="{{ $story->id }}">{{ $story->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('backlogs.view') }}" class="btn-secondary">↩ Retour</a>
                <button type="submit" class="btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
