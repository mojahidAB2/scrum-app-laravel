@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{-- Titre principal --}}
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-[#ba3dd1]">Liste des Projets</h1>
            <p class="text-gray-500 mt-2">Gérez facilement vos projets Scrum</p>
        </div>

        {{-- Bouton Ajouter un projet --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('projects.create') }}"
               class="bg-[#f18ac5] hover:bg-pink-500 text-white font-semibold py-2 px-4 rounded transition duration-300">
                + Nouveau Projet
            </a>
        </div>

        {{-- Tableau des projets --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-[#ba3dd1] text-white text-left text-sm uppercase">
                        <th class="px-6 py-3">Nom du projet</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Scrum Master</th>
                        <th class="px-6 py-3">Date de début</th>
                        <th class="px-6 py-3">Date de fin</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $project->name }}</td>
                            <td class="px-6 py-4">{{ $project->description }}</td>
                            <td class="px-6 py-4">{{ $project->scrum_master }}</td>
                            <td class="px-6 py-4">{{ $project->start_date }}</td>
                            <td class="px-6 py-4">{{ $project->end_date }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('projects.show', $project->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">Voir</a>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded text-sm">Modifier</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                      onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
