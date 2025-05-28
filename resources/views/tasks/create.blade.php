@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg p-8 mt-10">

    <h2 class="text-2xl font-bold mb-6 text-center text-green-400">Créer une tâche</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Titre</label>
            <input type="text" name="title" required
                   class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Statut</label>
            <select name="status"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="à faire">À faire</option>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Utilisateur assigné</label>
            <select name="user_id"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">-- Aucun --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Sprint</label>
            <select name="sprint_id"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">-- Aucun --</option>
                @foreach($sprints as $sprint)
                    <option value="{{ $sprint->id }}">{{ $sprint->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('tasks.index') }}"
               class="bg-gray-600 hover:bg-gray-500 text-white px-5 py-2 rounded-md transition">Annuler</a>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white px-5 py-2 rounded-md transition">Créer</button>
        </div>
    </form>
</div>
@endsection
