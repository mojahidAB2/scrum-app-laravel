@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-gray-800 text-white rounded-xl shadow-lg p-8">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-yellow-400">Liste des Sprints</h2>

        @php
            $firstProjectId = $sprints->first()?->projet->id ?? null;
        @endphp

        @if($firstProjectId)
            <a href="{{ route('sprints.create', ['project' => $firstProjectId]) }}"
               class="bg-green-500 hover:bg-green-600 text-white font-medium px-5 py-2 rounded-md transition">
                Ajouter un Sprint
            </a>
        @endif
    </div>

    @if ($sprints->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-md text-sm">
            Aucun sprint disponible pour l’instant.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-center border border-gray-700 rounded-md">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Projet</th>
                        <th class="px-4 py-3">Date début</th>
                        <th class="px-4 py-3">Date fin</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-600 bg-gray-800">
                    @foreach ($sprints as $sprint)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ $sprint->id }}</td>
                            <td class="px-4 py-2">{{ $sprint->name }}</td>
                            <td class="px-4 py-2">{{ $sprint->projet->name ?? 'Non défini' }}</td>
                            <td class="px-4 py-2">{{ $sprint->start_date }}</td>
                            <td class="px-4 py-2">{{ $sprint->end_date }}</td>
                            <td class="px-4 py-2 flex items-center justify-center gap-2">
                                <a href="{{ route('sprints.edit', $sprint->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-3 py-1 rounded text-sm">
                                    Modifier
                                </a>
                                <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
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
</div>
@endsection
