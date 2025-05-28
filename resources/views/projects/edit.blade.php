@extends('layouts.app')

@section('content')
<style>
.container {
    max-width: 768px;
    margin: 2rem auto;
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

h1.title {
    font-size: 1.75rem;
    font-weight: bold;
    color: #ba3dd1;
    margin-bottom: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.input-field,
.textarea-field {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.input-field:focus,
.textarea-field:focus {
    border-color: #f18ac5;
    box-shadow: 0 0 0 3px rgba(241, 138, 197, 0.3);
    outline: none;
}

.textarea-field {
    min-height: 100px;
    resize: vertical;
}

.button-group {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
}

.btn-primary {
    background-color: #ba3dd1;
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.btn-primary:hover {
    background-color: #a126b6;
}

.btn-link {
    color: #f18ac5;
    text-decoration: none;
    font-weight: 500;
    transition: text-decoration 0.2s ease;
}

.btn-link:hover {
    text-decoration: underline;
}
</style>

<div class="container">
    <h1 class="title">Modifier le Projet</h1>

    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        {{-- Nom du projet --}}
        <div class="form-group">
            <label for="name">Nom du projet</label>
            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                class="input-field" required>
        </div>

        {{-- Description --}}
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="textarea-field">{{ old('description', $project->description) }}</textarea>
        </div>

        {{-- Date de début --}}
        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}"
                class="input-field" required>
        </div>

        {{-- Date de fin --}}
        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date) }}"
                class="input-field">
        </div>

        <div class="button-group">
            <button type="submit" class="btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('projects.index') }}" class="btn-link">Annuler</a>
        </div>
    </form>
</div>
@endsection
