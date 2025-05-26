@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10 text-white">

    <h2 class="text-2xl font-bold text-cyan-400 mb-6">Détail de la tâche</h2>

    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <h4 class="text-xl font-semibold text-white mb-4">{{ $task->title }}</h4>

        <p class="mb-2"><span class="text-cyan-300 font-medium">Description :</span> {{ $task->description }}</p>
        <p class="mb-2"><span class="text-cyan-300 font-medium">Statut :</span> {{ ucfirst($task->status) }}</p>
        <p class="mb-2"><span class="text-cyan-300 font-medium">Utilisateur assigné :</span> {{ $task->user->name ?? 'Non assigné' }}</p>
        <p><span class="text-cyan-300 font-medium">Sprint :</span> {{ $task->sprint->name ?? 'Non assigné' }}</p>
    </div>

    <a href="{{ route('tasks.index') }}"
       class="inline-block mt-6 px-5 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded transition">
        Retour à la liste
    </a>

</div>
@endsection
