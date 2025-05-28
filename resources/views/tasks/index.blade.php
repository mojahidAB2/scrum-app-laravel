@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    <h2 class="text-2xl font-bold text-cyan-400 mb-6">Liste des Tâches</h2>

    <a href="{{ route('tasks.create') }}"
       class="inline-block mb-6 px-4 py-2 bg-transparent border border-cyan-400 text-cyan-300 rounded hover:bg-cyan-600 hover:text-white transition">
        + Créer une nouvelle tâche
    </a>

    @foreach ($tasks as $task)
        <div class="bg-gray-800 border border-cyan-700 rounded-lg shadow-lg mb-6">

            <div class="px-6 py-4 bg-cyan-600 text-black font-semibold rounded-t-md">
                #{{ $task->id }} — {{ $task->title }}
            </div>

            <div class="px-6 py-4 space-y-2 text-white">
                <p><span class="font-semibold text-cyan-300">Description :</span> {{ $task->description }}</p>
                <p><span class="font-semibold text-cyan-300">Statut :</span> {{ ucfirst($task->status) }}</p>
                <p><span class="font-semibold text-cyan-300">Utilisateur :</span> {{ $task->user->name ?? '-' }}</p>
                <p><span class="font-semibold text-cyan-300">Sprint :</span> {{ $task->sprint->name ?? '-' }}</p>

                <div class="flex items-center gap-4 mt-4">
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="px-4 py-1 bg-yellow-500 hover:bg-yellow-400 text-black rounded transition">
                        Modifier
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-1 bg-red-600 hover:bg-red-500 text-white rounded transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-gray-700 text-white px-6 py-4 rounded-b-md">
                <h6 class="font-semibold mb-2 text-cyan-300">Commentaires :</h6>

                @forelse ($task->comments as $comment)
                    <div class="bg-gray-800 border border-gray-600 rounded px-3 py-2 mb-2">
                        <p>{{ $comment->content }}</p>
                        <small class="text-gray-400 text-sm block text-right">
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                @empty
                    <p class="text-gray-400">Aucun commentaire pour l’instant.</p>
                @endforelse

                <form action="{{ route('comments.store', ['type' => 'task', 'id' => $task->id]) }}"
                      method="POST" class="mt-4 space-y-2">
                    @csrf
                    <input type="hidden" name="commentable_type" value="App\\Models\\Task">
                    <input type="hidden" name="commentable_id" value="{{ $task->id }}">

                    <textarea name="content" rows="2"
                              class="w-full bg-gray-800 border border-cyan-500 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-400"
                              placeholder="Ajouter un commentaire..."></textarea>

                    <button type="submit"
                            class="bg-cyan-600 hover:bg-cyan-500 text-white px-4 py-1 rounded transition">
                        Commenter
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
