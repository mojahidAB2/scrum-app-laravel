@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- ✅ Titre --}}
    <h2 class="text-2xl font-bold text-center text-[#ba3dd1] mb-8">📋 Liste des Backlogs</h2>

    {{-- ➕ Formulaire d’ajout --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h3 class="text-lg font-semibold text-green-600 mb-4">Ajouter un nouveau Backlog</h3>
        <form method="POST" action="{{ route('backlogs.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Project ID</label>
                    <input type="number" name="project_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="titre" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="description" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Associer à une User Story</label>
                <select name="user_story_id" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">-- Sélectionner --</option>
                    @foreach ($userStories as $story)
                        <option value="{{ $story->id }}">{{ $story->titre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow">
                 Enregistrer
            </button>
        </form>
    </div>

    {{-- 📄 Tableau des Backlogs --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-center border rounded-lg shadow">
            <thead class="bg-[#ba3dd1] text-white uppercase">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Projet</th>
                    <th class="px-3 py-2">User Story</th>
                    <th class="px-3 py-2">Titre</th>
                    <th class="px-3 py-2">Description</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($backlogs as $backlog)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-3 py-2">{{ $backlog->id }}</td>
                        <td class="px-3 py-2">{{ $backlog->project_id }}</td>
                        <td class="px-3 py-2">{{ $backlog->userStory->titre ?? '—' }}</td>
                        <td class="px-3 py-2">{{ $backlog->titre }}</td>
                        <td class="px-3 py-2">{{ $backlog->description }}</td>
                        <td class="px-3 py-2 space-x-2">
                            <a href="{{ route('backlogs.edit', $backlog->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded text-sm">
                                Modifier
                            </a>

                            <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}" class="inline-block"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce backlog ?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
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
