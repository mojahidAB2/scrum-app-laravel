@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #3B82F6;
        --secondary: #6366F1;
        --bg-light: #F9FAFB;
        --text-dark: #111827;
    }

    body {
        background-color: var(--bg-light);
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    .form-container {
        max-width: 600px;
        margin: 3rem auto;
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-container h1 {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--primary);
        text-align: center;
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
        font-weight: 600;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.5rem;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        color: var(--text-dark);
        margin-bottom: 1.2rem;
        font-size: 0.95rem;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }

    .btn-update {
        background-color: var(--primary);
        color: white;
        padding: 0.6rem 2rem;
        font-weight: bold;
        border-radius: 0.5rem;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .btn-update:hover {
        background-color: var(--secondary);
    }
</style>

<div class="form-container">
    <h1>Modifier le sprint</h1>

    @if (session('success'))
        <div style="background:#dcfce7; color:#065f46; padding:1rem; border-radius:0.5rem; margin-bottom:1rem; text-align:center;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sprints.update', $sprint->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom du sprint</label>
            <input type="text" name="name" id="name" value="{{ $sprint->name }}" required>
        </div>
        <div>
            <label for="start_date">Date début</label>
            <input type="date" name="start_date" id="start_date" value="{{ $sprint->start_date }}" required>
        </div>

        <div>
            <label for="end_date">Date fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ $sprint->end_date }}" required>
        </div>

        <div>
            <label for="objective">Objectif</label>
            <textarea name="objective" id="objective" rows="4" required>{{ $sprint->objective }}</textarea>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn-update">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
