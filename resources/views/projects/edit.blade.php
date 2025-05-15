@extends('layouts.app')

@section('content')
<div class="dark-form-container">
    <h2 class="form-title">🛠️ Modifier le Projet : <span>{{ $project->name }}</span></h2>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="dark-form">
        @csrf
        @method('PUT')

        <div class="form-field">
            <label>📌 Nom du projet</label>
            <input type="text" name="name" value="{{ old('name', $project->name) }}" required>
        </div>

        <div class="form-field">
            <label>📝 Description</label>
            <textarea name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-field">
            <label>👤 Scrum Master</label>
            <input type="text" name="scrum_master" value="{{ old('scrum_master', $project->scrum_master) }}" required>
        </div>

        <div class="form-dates">
            <div class="form-field">
                <label>📅 Début</label>
                <input type="date" name="start_date" value="{{ old('start_date', $project->start_date) }}" required>
            </div>
            <div class="form-field">
                <label>⏳ Fin</label>
                <input type="date" name="end_date" value="{{ old('end_date', $project->end_date) }}" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-dark">💾 Mettre à jour</button>
            <a href="{{ route('projects.index') }}" class="btn-back">⬅ Retour</a>
        </div>
    </form>
</div>

<style>
body {
    background-color: #0f172a;
    font-family: 'Segoe UI', sans-serif;
    color: #f8fafc;
}

.dark-form-container {
    max-width: 750px;
    margin: 60px auto;
    background-color: #1e293b;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 0 30px rgba(0,0,0,0.5);
    animation: fadeIn 0.5s ease-in-out;
}

.form-title {
    color: #38bdf8;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
}

.form-title span {
    color: #f1f5f9;
}

.form-field {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #cbd5e1;
}

input[type="text"],
input[type="date"],
textarea {
    width: 100%;
    padding: 12px;
    background-color: #334155;
    border: 1px solid #475569;
    border-radius: 8px;
    font-size: 15px;
    color: #f8fafc;
}

input:focus, textarea:focus {
    border-color: #38bdf8;
    outline: none;
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
}

.form-dates {
    display: flex;
    gap: 20px;
}

.form-actions {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn-dark {
    background-color: #38bdf8;
    padding: 10px 24px;
    color: #0f172a;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-dark:hover {
    background-color: #0ea5e9;
    color: #fff;
}

.btn-back {
    background-color: #475569;
    padding: 10px 20px;
    color: #e2e8f0;
    text-decoration: none;
    border-radius: 8px;
}

.btn-back:hover {
    background-color: #334155;
    color: white;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
