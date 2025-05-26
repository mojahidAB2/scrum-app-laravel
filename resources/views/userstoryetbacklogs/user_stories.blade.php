@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">

    {{-- 🔵 Titre --}}
    <h2 class="text-2xl font-bold text-[#4A249D] text-center mb-8">📘 Liste des User Stories</h2>

    {{-- ➕ Formulaire --}}
    <div class="bg-white p-6 rounded-xl shadow mb-10">
        <h3 class="text-lg font-semibold text-green-700 mb-4">Ajouter une nouvelle User Story</h3>
        <form method="POST" action="{{ route('user_stories.store') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @csrf

            <input type="number" name="project_id" placeholder="Project ID" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="titre" placeholder="Titre" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="en_tant_que" placeholder="En tant que" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="je_veux" placeholder="Je veux" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="afin_de" placeholder="Afin de" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <div class="md:col-span-5 flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Enregistrer</button>
            </div>
        </form>
    </div>

    {{-- 📋 Tableau --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-[#ba3dd1] text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Titre</th>
                    <th class="px-4 py-2">En tant que</th>
                    <th class="px-4 py-2">Je veux</th>
                    <th class="px-4 py-2">Afin de</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $story)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $story->id }}</td>
                        <td class="px-4 py-2">{{ $story->titre }}</td>
                        <td class="px-4 py-2">{{ $story->en_tant_que }}</td>
                        <td class="px-4 py-2">{{ $story->je_veux }}</td>
                        <td class="px-4 py-2">{{ $story->afin_de }}</td>
                        <td class="px-4 py-2 flex flex-wrap gap-2">
                            <a href="{{ route('user_stories.edit', $story->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">Modifier</a>
                            <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette User Story ?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 💬 Commentaires --}}
    @foreach ($stories as $story)
        <div class="bg-white rounded-xl shadow my-6">
            <div class="bg-gray-100 px-4 py-3 font-semibold">{{ $story->titre }} — Commentaires</div>
            <div class="p-4">
                @forelse($story->comments as $comment)
                    <div class="mb-2 text-sm">
                        <span class="font-semibold text-gray-800">{{ $comment->user->name ?? 'Utilisateur' }}</span> :
                        <span>{{ $comment->content }}</span>
                        <span class="text-gray-400 text-xs">({{ $comment->created_at->diffForHumans() }})</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm italic">Aucun commentaire pour cette story.</p>
                @endforelse

                <form action="{{ route('comments.store', ['type' => 'userstory', 'id' => $story->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="content" rows="2" placeholder="Ajouter un commentaire..." required
                        class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                    <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 text-sm">Commenter</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
