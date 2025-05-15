@extends('layouts.app')

@section('content')
<div class="dark-dashboard-container">
    <h2 class="form-title">📁 Nouveau Projet</h2>

    <form action="{{ route('projects.store') }}" method="POST" class="dark-form">
        @csrf

        <div class="form-group">
            <label for="name">📝 Nom du projet</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">🗒️ Description</label>
            <textarea name="description" id="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="start_date">📅 Date de début</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">📆 Date de fin</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>

        <div class="form-group">
            <label for="scrum_master">👤 Scrum Master</label>
            <input type="text" name="scrum_master" id="scrum_master" required>
        </div>

        <div class="form-group">
            <label for="priorite">🚦 Priorité</label>
            <select name="priorite" id="priorite" required>
                <option value="Haute">🔴 Haute</option>
                <option value="Moyenne">🟡 Moyenne</option>
                <option value="Basse">🟢 Basse</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">💡 Type de projet</label>
            <input type="text" name="type" id="type" required>
        </div>

        <div class="form-group">
            <label for="objectifs">🎯 Objectifs</label>
            <textarea name="objectifs" id="objectifs" rows="3"></textarea>
        </div>

        <button type="submit" class="btn-dark-submit">✅ Créer le Projet</button>
    </form>
</div>

<style>
    body {
        background-color: #0e1a2b;
        font-family: 'Segoe UI', sans-serif;
        color: #e0e6ed;
    }

    .dark-dashboard-container {
        max-width: 750px;
        margin: 50px auto;
        background-color: #182b45;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.08);
        animation: fadeIn 0.6s ease-in-out;
    }

    .form-title {
        text-align: center;
        font-size: 24px;
        color: #00c8ff;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #c9d1d9;
    }

    input, textarea, select {
        width: 100%;
        background-color: #1e3a5c;
        border: 1px solid #2b4b72;
        color: #e6edf3;
        padding: 12px;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #00c8ff;
        background-color: #223b5e;
        box-shadow: 0 0 5px rgba(0, 200, 255, 0.4);
    }

    .btn-dark-submit {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #00c6ff, #0072ff);
        border: none;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .btn-dark-submit:hover {
        background: linear-gradient(to right, #0072ff, #00c6ff);
        box-shadow: 0 0 10px rgba(0, 200, 255, 0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
