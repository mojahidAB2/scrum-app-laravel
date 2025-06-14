@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #a044ff, #f18ac5);
        min-height: 100vh;
    }

    .sprint-box {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-purple {
        background-color: #ba3dd1;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        border-radius: 0.5rem;
        transition: background 0.2s ease-in-out;
    }

    .btn-purple:hover {
        background-color: #9d28b6;
    }

    .btn-outline {
        border: 2px solid #ba3dd1;
        color: #ba3dd1;
        font-weight: 600;
        padding: 0.4rem 1rem;
        border-radius: 0.5rem;
        background: white;
    }

    .btn-outline:hover {
        background-color: #f3dcf7;
    }

    .btn-danger {
        background-color: #e3342f;
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        border: none;
    }

    .btn-danger:hover {
        background-color: #cc1f1a;
    }

    select {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0.5rem 0.75rem;
        width: 200px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: linear-gradient(to right, #f5e9f7, #e9d5f4);
        border-radius: 0.5rem;
        overflow: hidden;
    }

    th {
        background-color: #ba3dd1;
        color: white;
        padding: 0.75rem;
        font-weight: bold;
    }

    td {
        padding: 0.75rem;
        text-align: center;
        font-weight: 500;
    }

    tr:nth-child(even) {
        background-color: #fdf2fa;
    }

    tr:hover {
        background-color: #f4d8f3;
    }
</style>

<div class="max-w-6xl mx-auto mt-12">
    <div class="sprint-box">

        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2 text-[#ba3dd1]">
            <i class="fas fa-calendar-alt"></i> Liste des Sprints
        </h2>
        {{-- ✅ Message de succès --}}
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
                                <td class="flex justify-center gap-2">
                                    <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn-outline">Modifier</a>

                                    <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                             @method('DELETE')
                            <button type="submit" class="btn-danger">Supprimer</button>
                                 </form>
                                 <!-- ✅ Ici le bouton d'assignation -->

                              <a href="{{ route('sprints.assign.form', $sprint->id) }}" class="btn btn-sm btn-outline-success mt-1">Assigner Backlogs</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- 🔘 Boutons centrés --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-4">
            <form id="createSprintForm" method="GET" action="">
    <div class="flex flex-col items-center justify-center gap-4 mt-6">
        {{-- 🔽 Select projet --}}
        <select name="project_id" id="projectSelect"
                class="border border-gray-300 rounded px-4 py-2 text-center" required>
            <option disabled selected>Choisir un projet</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>

        {{-- 🟣 Bouton Créer un Sprint --}}
        <button type="submit"
                class="btn-purple w-fit">
            Créer un Sprint
        </button>
    </div>
</form>




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
