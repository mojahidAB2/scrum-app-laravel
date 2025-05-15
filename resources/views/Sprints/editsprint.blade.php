@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }

    .edit-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-top: 50px;
    }

    .edit-title {
        font-size: 24px;
        font-weight: bold;
        color: #fbbf24;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
        color: #e5e7eb;
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
        font-size: 16px;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 0 2px #3b82f6;
    }

    .btn-update {
        background-color: #10b981;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn-update:hover {
        background-color: #059669;
    }
</style>

<div class="container edit-container">
    <h1 class="edit-title"> Modifier le sprint</h1>

    <form action="{{ route('sprints.update', $sprint->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom du sprint</label>
        <input type="text" name="name" id="name" value="{{ $sprint->name }}" required>

        <label for="start_date">Date début</label>
        <input type="date" name="start_date" id="start_date" value="{{ $sprint->start_date }}" required>

        <label for="end_date">Date fin</label>
        <input type="date" name="end_date" id="end_date" value="{{ $sprint->end_date }}" required>

        <button type="submit" class="btn-update"> Mettre à jour</button>
    </form>
</div>
@endsection
