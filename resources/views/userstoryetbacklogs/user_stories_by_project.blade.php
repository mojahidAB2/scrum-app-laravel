@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Titre --}}
    <h2 class="text-2xl font-bold text-white mb-6">
        User Stories du Projet #{{ $projectId }}
    </h2>

    {{-- Alerte si vide --}}
    @if ($stories->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
            Aucune User Story trouvée pour ce projet.
        </div>
    @else
        {{-- Tableau --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 text-gray-100 rounded-lg overflow-hidden shadow">
                <thead class="bg-gray-700 text-left text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3">Titre</th>
                        <th class="px-4 py-3">En tant que</th>
                        <th class="px-4 py-3">Je veux</th>
                        <th class="px-4 py-3">Afin de</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stories as $story)
                        <tr class="border-b border-gray-600 hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $story->titre }}</td>
                            <td class="px-4 py-3">{{ $story->en_tant_que }}</td>
                            <td class="px-4 py-3">{{ $story->je_veux }}</td>
                            <td class="px-4 py-3">{{ $story->afin_de }}</td>
                            <td class="px-4 py-3 text-center flex justify-center gap-2">
                                <a href="{{ route('user_stories.edit', $story->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded text-sm font-semibold">Modifier</a>
                                <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Retour --}}
    <div class="mt-6">
        <a href="{{ route('projects.show', $projectId) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium">
            Retour au projet
        </a>
    </div>
</div>
@endsection
