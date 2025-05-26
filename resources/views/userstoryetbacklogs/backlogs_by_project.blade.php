@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Titre --}}
    <h2 class="text-2xl font-bold text-white mb-6">
        Backlogs du Projet #{{ $projectId }}
    </h2>

    {{-- Message si vide --}}
    @if ($backlogs->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
            Aucun backlog n'est associé à ce projet.
        </div>
    @else
        {{-- Tableau --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 text-gray-100 rounded-lg overflow-hidden shadow">
                <thead class="bg-gray-700 text-left text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">User Story</th>
                        <th class="px-4 py-3">Titre</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Priorité</th>
                        <th class="px-4 py-3">Statut</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backlogs as $backlog)
                        <tr class="border-b border-gray-600 hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $backlog->id }}</td>
                            <td class="px-4 py-3">{{ $backlog->userStory->titre ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $backlog->titre }}</td>
                            <td class="px-4 py-3">{{ $backlog->description }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded">
                                    {{ ucfirst($backlog->priorite) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block bg-gray-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                    {{ ucfirst($backlog->statut) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 flex justify-center gap-2">
                                <a href="{{ route('backlogs.edit', $backlog->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded text-sm font-semibold">
                                    Modifier
                                </a>
                                <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Bouton retour --}}
    <div class="mt-6">
        <a href="{{ route('projects.show', $projectId) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium">
            Retour au projet
        </a>
    </div>

</div>
@endsection
