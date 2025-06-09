@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}

.container {
    max-width: 768px;
    margin: 3rem auto;
    padding: 2.5rem;
    background: linear-gradient(to bottom right, #ffd6e0, #ffb3c6, #fbb1ff);
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.title {
    font-size: 2rem;
    font-weight: bold;
    color: #6A0572;
    text-align: center;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.input-field,
.textarea-field {
    width: 100%;
    padding: 0.65rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
    transition: border 0.3s, box-shadow 0.3s;
    font-family: inherit;
}

.input-field:focus,
.textarea-field:focus {
    outline: none;
    border-color: #FF8400;
    box-shadow: 0 0 0 3px rgba(255,132,0,0.25);
}

.textarea-field {
    min-height: 120px;
    resize: vertical;
}

.button-group {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.btn-primary {
    background: linear-gradient(to right, #E84A5F, #6A0572);
    color: white;
    font-weight: bold;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.btn-primary:hover {
    background: linear-gradient(to right, #6A0572, #E84A5F);
}

.btn-link {
    color: #FF8400;
    text-decoration: none;
    font-weight: 500;
    padding: 0.6rem 2rem;
    border-radius: 8px;
    border: 2px solid #FF8400;
    transition: all 0.3s ease;
}
.btn-link:hover {
    background-color: #ffedd5;
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
            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" class="input-field" required>
        </div>

        {{-- Description --}}
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="textarea-field">{{ old('description', $project->description) }}</textarea>
        </div>

        {{-- Date de début --}}
        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}" class="input-field" required>
        </div>

        {{-- Date de fin --}}
        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date) }}" class="input-field">
        </div>

        <div class="button-group">
            <button type="submit" class="btn-primary">Enregistrer</button>
            <a href="{{ route('projects.index') }}" class="btn-link">Annuler</a>
        </div>
    </form>
</div>
@endsection
