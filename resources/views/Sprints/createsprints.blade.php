@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }
    .form-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-top: 40px;
    }
    .form-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #fff;
    }
    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
    }
    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        background-color: #374151;
        color: #fff;
        margin-bottom: 20px;
    }
    input:focus {
        outline: none;
        box-shadow: 0 0 0 2px #3b82f6;
    }
    .btn-submit {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s;
    }
    .btn-submit:hover {
        background-color: #2563eb;
    }
</style>

<div class="container form-container">
    <h1 class="form-title">Créer un sprint pour le projet : {{ $project->name }}</h1>

    <form action="{{ route('sprints.store', $project->id) }}" method="POST">
        @csrf

        <label for="name">Nom du sprint</label>
        <input type="text" name="name" id="name" required>

        <label for="start_date">Date début</label>
        <input type="date" name="start_date" id="start_date" required>

        <label for="end_date">Date fin</label>
        <input type="date" name="end_date" id="end_date" required>

        <button type="submit" class="btn-submit">Créer</button>
    </form>
</div>
@endsection
