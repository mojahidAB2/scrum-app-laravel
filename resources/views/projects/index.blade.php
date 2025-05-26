@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

    {{-- 🟪 Titre --}}
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-[#ba3dd1]">Liste des Projets</h1>
        <p class="text-gray-500 mt-2">Gérez facilement vos projets Scrum</p>
    </div>

    {{-- ➕ Bouton Ajouter --}}
    <div class="flex justify-end mb-6">
        <a href="{{ route('projects.create') }}"
           class="bg-[#f18ac5] hover:bg-[#e278af] text-white font-semibold py-2 px-4 rounded-md transition">
            + Nouveau Projet
        </a>
    </div>

    {{-- 📋 Tableau --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-[#ba3dd1] text-white uppercase text-left">
                <tr>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Scrum Master</th>
                    <th class="px-6 py-3">Début</th>
                    <th class="px-6 py-3">Fin</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($projects as $project)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $project->name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($project->description, 40) }}</td>
                        <td class="px-6 py-4">{{ $project->scrum_master }}</td>
                        <td class="px-6 py-4">{{ $project->start_date }}</td>
                        <td class="px-6 py-4">{{ $project->end_date }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('projects.show', $project->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">Voir</a>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded text-sm">Modifier</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                      onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
