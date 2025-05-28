@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg p-8 mt-10">

    <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">Modifier la tâche</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Titre</label>
            <input type="text" name="title" required value="{{ $task->title }}"
                   class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $task->description }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Statut</label>
            <select name="status"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="à faire" {{ $task->status == 'à faire' ? 'selected' : '' }}>À faire</option>
                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Utilisateur assigné</label>
            <select name="user_id"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="">-- Aucun --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Sprint</label>
            <select name="sprint_id"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="">-- Aucun --</option>
                @foreach($sprints as $sprint)
                    <option value="{{ $sprint->id }}" {{ $task->sprint_id == $sprint->id ? 'selected' : '' }}>{{ $sprint->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('tasks.index') }}"
               class="bg-gray-600 hover:bg-gray-500 text-white px-5 py-2 rounded-md transition">Annuler</a>
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-5 py-2 rounded-md transition">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
