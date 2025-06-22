@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #6366F1;
    --bg-light: #F9FAFB;
    --text-dark: #111827;
    --gold: #facc15;
    --pink-neon: #F900BF;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
}

.title {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    color: var(--indigo);
    margin-bottom: 2.5rem;
}

.table-container {
    background-color: #ffffff;
    padding: 1.5rem;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.95rem;
    border-radius: 8px;
    overflow: hidden;
}

.table thead {
    background: linear-gradient(to right, var(--blue-main), var(--indigo));
    color: white;
    text-transform: uppercase;
    font-weight: 600;
}

.table th,
.table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

.table tbody tr {
    transition: background 0.2s ease;
}
.table tbody tr:hover {
    background-color: #f3f4f6;
}

/* 🎯 Boutons d'action */
.actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
}

.actions a,
.actions button {
    font-size: 0.85rem;
    padding: 0.4rem 1rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.btn-edit {
    background-color: var(--gold);
    color: #1e293b;
}
.btn-edit:hover {
    background-color: #ffdb70;
}

.btn-delete {
    background-color: rgb(224, 2, 2);
    color: white;
}
.btn-delete:hover {
    background-color: #7407e8;
}

/* 💬 Zone commentaire */
.comment-box {
    background-color: #fff;
    margin-top: 2rem;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
}

.comment-header {
    background: linear-gradient(to right, var(--blue-main), var(--indigo));
    color: white;
    padding: 0.75rem 1rem;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    font-weight: bold;
}

.comment-body {
    padding: 1rem;
}

.comment-textarea {
    width: 100%;
    padding: 0.6rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    resize: vertical;
    font-size: 0.95rem;
}

.comment-button {
    background-color: var(--blue-main);
    color: white;
    padding: 0.45rem 1.2rem;
    margin-top: 0.5rem;
    border-radius: 6px;
    font-weight: 600;
    transition: background-color 0.2s ease;
}

.comment-button:hover {
    background-color: var(--indigo);
}
</style>

<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="title">Liste des User Stories</h2>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>EN TANT QUE</th>
                    <th>JE VEUX</th>
                    <th>AFIN DE</th>
                    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'product_owner')
                        <th>ACTIONS</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($stories as $story)
                    <tr>
                        <td>{{ $story->titre }}</td>
                        <td>{{ $story->en_tant_que }}</td>
                        <td>{{ $story->je_veux }}</td>
                        <td>{{ $story->afin_de }}</td>

                        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'product_owner')
                        <td>
                            <div class="actions">
                                <a href="{{ route('user_stories.edit', $story->id) }}" class="btn-edit">Modifier</a>
                                <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                        @endif
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
