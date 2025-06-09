@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}
.title {
    text-align: center;
    font-size: 1.75rem;
    font-weight: bold;
    color: #6A0572;
    margin-bottom: 2rem;
}
.table-container {
    background: linear-gradient(to bottom right, #ffd6e0, #ffb3c6, #fbb1ff);
    padding: 1.5rem;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
}
.table th {
    background-color: #ba3dd1;
    color: white;
    text-transform: uppercase;
    padding: 0.75rem;
}
.table td {
    padding: 0.75rem;
    border-bottom: 1px solid #e5e7eb;
}
.table tr:hover {
    background-color: #fef9ff;
}
.actions a,
.actions button {
    font-size: 0.75rem;
    padding: 0.4rem 0.75rem;
    border-radius: 6px;
    font-weight: 600;
}
.btn-edit {
    background-color: #facc15;
    color: black;
}
.btn-edit:hover {
    background-color: #eab308;
}
.btn-delete {
    background-color: #ef4444;
    color: white;
}
.btn-delete:hover {
    background-color: #dc2626;
}
.comment-box {
    background-color: white;
    margin-top: 2rem;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
}
.comment-header {
    background-color: #f3f4f6;
    padding: 0.75rem 1rem;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    font-weight: bold;
    color: #6B21A8;
}
.comment-body {
    padding: 1rem;
}
.comment-textarea {
    width: 100%;
    padding: 0.6rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    resize: vertical;
}
.comment-button {
    background-color: #3b82f6;
    color: white;
    padding: 0.4rem 1rem;
    margin-top: 0.5rem;
    border-radius: 6px;
}
.comment-button:hover {
    background-color: #2563eb;
}
</style>

<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="title">Liste des User Stories</h2>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>En tant que</th>
                    <th>Je veux</th>
                    <th>Afin de</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $story)
                    <tr>
                        <td>{{ $story->id }}</td>
                        <td>{{ $story->titre }}</td>
                        <td>{{ $story->en_tant_que }}</td>
                        <td>{{ $story->je_veux }}</td>
                        <td>{{ $story->afin_de }}</td>
                        <td class="actions flex gap-2">
                            <a href="{{ route('user_stories.edit', $story->id) }}" class="btn-edit">Modifier</a>
                            <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette User Story ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 💬 Commentaires --}}
    @foreach ($stories as $story)
        <div class="comment-box mt-8">
            <div class="comment-header">{{ $story->titre }} — Commentaires</div>
            <div class="comment-body">
                @forelse($story->comments as $comment)
                    <div class="mb-2 text-sm">
                        <strong>{{ $comment->user->name ?? 'Utilisateur' }}:</strong> {{ $comment->content }}
                        <span class="text-gray-400 text-xs">({{ $comment->created_at->diffForHumans() }})</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm italic">Aucun commentaire pour cette story.</p>
                @endforelse

                {{-- Formulaire d’ajout --}}
                <form action="{{ route('comments.store', ['type' => 'userstory', 'id' => $story->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="content" rows="2" class="comment-textarea" placeholder="Ajouter un commentaire..." required></textarea>
                    <button type="submit" class="comment-button">Commenter</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
