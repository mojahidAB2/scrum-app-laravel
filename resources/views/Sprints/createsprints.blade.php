@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #a044ff, #f18ac5);
        min-height: 100vh;
    }

    .form-box {
        background: #1f2937;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .form-box h1 {
        color: #ffffff;
        font-size: 1.75rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.4rem;
        color: #f3f4f6;
        font-weight: 500;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        background: #374151;
        border: 1px solid #4b5563;
        border-radius: 0.5rem;
        padding: 0.5rem 0.75rem;
        color: white;
        transition: border 0.2s ease-in-out;
    }

    input:focus,
    textarea:focus {
        border-color: #ba3dd1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(186, 61, 209, 0.4);
    }

    .btn-submit {
        background-color: #ba3dd1;
        color: white;
        font-weight: 600;
        padding: 0.6rem 1.5rem;
        border-radius: 0.5rem;
        transition: background 0.2s ease-in-out;
    }

    .btn-submit:hover {
        background-color: #9d28b6;
    }
</style>

<div class="max-w-2xl mx-auto mt-12">
    <div class="form-box">
        <h1>Créer un sprint pour le projet : {{ $project->name }}</h1>

        <form action="{{ route('sprints.store', $project->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name">Nom du sprint</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="start_date">Date début</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>

            <div>
                <label for="end_date">Date fin</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>

            <div>
                <label for="objective">Objectif</label>
                <textarea name="objective" id="objective" rows="3" required></textarea>
            </div>
         <div>
    <label for="backlogs" class="block text-sm font-medium text-gray-300 mb-1">
        Associer des backlogs
    </label>
    <select name="backlogs[]" id="backlogs" multiple required
        class="w-full rounded-md bg-gray-800 text-gray-200 border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
        @foreach ($backlogs as $backlog)
            <option value="{{ $backlog->id }}">
                {{ $backlog->titre }} - {{ $backlog->description }}
            </option>
        @endforeach
    </select>
    <p class="text-sm text-gray-400 mt-1">Utilisez Ctrl (ou Cmd) + clic pour sélectionner plusieurs.</p>
</div>



            <div class="text-center">
                <button type="submit" class="btn-submit">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection
