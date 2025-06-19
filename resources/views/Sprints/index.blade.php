@extends('layouts.app')

@section('content')
<style>
    :root {
        --blue-main: #3B82F6;
        --indigo: #b795f1;
        --bg-light: #F9FAFB;
        --text-dark: #111827;
        --gold: #facc15;
        --pink-neon: #1500f9;
    }

    body {
        background: linear-gradient(to bottom right, var(--bg-light));
        min-height: 100vh;
    }

    .sprint-box {
        background: var(--bg-light);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2.title {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--pink-neon);
        text-align: center;
        margin-bottom: 2rem;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        text-align: center;
        color: white;
        text-decoration: none;
        display: inline-block;
        width: 160px;
    }

    .btn-modifier {
        background-color: var(--blue-main);
    }

    .btn-modifier:hover {
        background-color: #2563eb;
    }

    .btn-supprimer {
        background-color: rgb(243, 114, 114);
    }

    .btn-supprimer:hover {
        background-color: darkred;
    }

    .btn-assign {
        background-color: var(--indigo);
    }

    .btn-assign:hover {
        background-color: #9d78e0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    th {
        background-color: var(--blue-main);
        color: white;
        padding: 0.75rem;
        font-weight: bold;
    }

    td {
        padding: 0.75rem;
        text-align: center;
        font-weight: 500;
        color: var(--text-dark);
        vertical-align: middle;
    }

    tr:nth-child(even) {
        background-color: #f3f4f6;
    }

    tr:hover {
        background-color: #e5e7eb;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    select {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0.5rem 0.75rem;
        width: 200px;
    }

    .btn-purple {
        background-color: var(--indigo);
        color: white;
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        border-radius: 0.5rem;
        transition: background 0.2s ease-in-out;
    }

    .btn-purple:hover {
        background-color: var(--blue-main);
    }
</style>

<div class="max-w-6xl mx-auto mt-12">
    <div class="sprint-box">
        <h2 class="title">Liste des Sprints</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($sprints->isEmpty())
            <p class="text-gray-700">Aucun sprint disponible pour l’instant.</p>
        @else
            <div class="overflow-x-auto mb-6">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Projet</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sprints as $sprint)
                        <tr>
                            <td>{{ $sprint->name }}</td>
                            <td>{{ $sprint->project->name ?? 'Non défini' }}</td>
                            <td>{{ $sprint->start_date }}</td>
                            <td>{{ $sprint->end_date }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn-action btn-modifier">Modifier</a>

                                    <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-supprimer">Supprimer</button>
                                    </form>

                                    <a href="{{ route('sprints.assign.form', $sprint->id) }}" class="btn-action btn-assign">Assigner Backlogs</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Formulaire de création -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-4">
            <form id="createSprintForm" method="GET" action="">
                <div class="flex flex-col items-center justify-center gap-4 mt-6">
                    <select name="project_id" id="projectSelect" required>
                        <option disabled selected>Choisir un projet</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-purple w-fit">Créer un Sprint</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('createSprintForm');
    const select = document.getElementById('projectSelect');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const selectedId = select.value;
        if (selectedId) {
            window.location.href = '/sprints/create/' + selectedId;
        } else {
            alert("Veuillez choisir un projet !");
        }
    });
</script>
@endsection
