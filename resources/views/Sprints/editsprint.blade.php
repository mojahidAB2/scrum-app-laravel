@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #ffe0c3, #ffc1a3); /* 🎨 skin gradient */
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
        max-width: 600px;
        margin: 4rem auto;
        background: #1f2937;
        color: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .form-container h1 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #ffb77b;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        font-weight: 500;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.5rem;
        background-color: #374151;
        color: white;
        border: 1px solid #4b5563;
        margin-bottom: 1.2rem;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #f18ac5;
        box-shadow: 0 0 0 3px rgba(241, 138, 197, 0.4);
    }

    .btn-update {
        background-color: #f18ac5;
        color: white;
        padding: 0.6rem 2rem;
        font-weight: bold;
        border-radius: 0.5rem;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .btn-update:hover {
        background-color: #e176ae;
    }
</style>

<div class="form-container">
    <h1>Modifier le sprint</h1>

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
