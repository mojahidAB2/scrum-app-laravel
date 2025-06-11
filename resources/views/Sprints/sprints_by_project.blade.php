@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-6 py-8 bg-gradient-to-br from-[#1f2937] to-[#111827] text-white rounded-xl shadow-lg">

    {{-- 🔖 Titre --}}
    <h2 class="text-3xl font-bold text-center text-[#f18ac5] mb-8">
        📅 Sprints du Projet #{{ $projectId }}
    </h2>

    {{-- 📌 Message si aucun sprint --}}
    @if ($sprints->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-4 text-center text-sm font-semibold">
            Aucun sprint disponible pour ce projet.
        </div>
    @else
        {{-- 🗂️ Tableau des sprints --}}
        <div class="overflow-x-auto rounded-lg border border-gray-700 shadow-inner">
            <table class="min-w-full divide-y divide-gray-700 text-sm text-center">
                <thead class="bg-gray-700 text-white uppercase tracking-wide text-xs">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Début</th>
                        <th class="px-4 py-3">Fin</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach ($sprints as $sprint)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-3">{{ $sprint->id }}</td>
                            <td class="px-4 py-3 font-medium text-[#ba3dd1]">{{ $sprint->name }}</td>
                            <td class="px-4 py-3">{{ $sprint->start_date }}</td>
                            <td class="px-4 py-3">{{ $sprint->end_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ✅ Formulaire de sélection projet + bouton créer --}}
<div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-6">
    <form action="{{ route('sprints.index') }}" method="GET" class="flex items-center gap-3">
        <select name="project_id" onchange="this.form.submit()"
                class="px-4 py-2 rounded border border-gray-300 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ba3dd1]">
            <option disabled selected>Choisir un projet</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </form>

    @if($projects->isNotEmpty())
        <a href="{{ route('sprints.create', ['project' => $projects->first()->id]) }}"
           class="bg-[#ba3dd1] hover:bg-[#a62abb] text-white font-semibold px-5 py-2 rounded transition">
            Créer un Sprint
        </a>
    @endif
</div>

        </div>
    @endif

    {{-- 🔙 Bouton Retour --}}
    <div class="mt-8 text-center">
        <a href="{{ route('projects.show', $projectId) }}"
           class="inline-block bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold px-6 py-2 rounded transition duration-200">
            ← Retour au projet
        </a>
    </div>
</div>
@endsection
