<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User Stories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h2 class="mb-4 text-center text-primary">Liste des User Stories</h2>

    {{-- ➕ Formulaire d’ajout --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">Ajouter une nouvelle User Story</div>
        <div class="card-body">
            <form method="POST" action="{{ route('user_stories.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label>Project ID</label>
                        <input type="number" name="project_id" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Titre</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>En tant que</label>
                        <input type="text" name="en_tant_que" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Je veux</label>
                        <input type="text" name="je_veux" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Afin de</label>
                        <input type="text" name="afin_de" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </form>
        </div>
    </div>

    {{-- 📋 Tableau des user stories --}}
    <table class="table table-hover table-bordered shadow-sm">
        <thead class="table-primary">
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
                    <td class="d-flex gap-1">
                        <a href="{{ route('user_stories.edit', $story->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form method="POST" action="{{ route('user_stories.destroy', $story->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette User Story ?');">
                            @csrf
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 💬 Commentaires et formulaire pour chaque story --}}
    @foreach ($stories as $story)
        <div class="card my-4 shadow-sm">
            <div class="card-header bg-light">
                <strong>{{ $story->titre }}</strong> – Commentaires
            </div>
            <div class="card-body">
                {{-- Commentaires --}}
                @forelse($story->comments as $comment)
                    <div class="mb-2">
                        <strong>{{ $comment->user->name ?? 'Utilisateur' }} :</strong> {{ $comment->content }}
                        <small class="text-muted">— {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @empty
                    <p class="text-muted">Aucun commentaire pour cette story.</p>
                @endforelse

                {{-- Formulaire d’ajout de commentaire --}}
                <form action="{{ route('comments.store', ['type' => 'userstory', 'id' => $story->id]) }}" method="POST" class="mt-3">
                    @csrf
                    <textarea name="content" class="form-control mb-2" rows="2" placeholder="Ajouter un commentaire..." required></textarea>
                    <button type="submit" class="btn btn-primary btn-sm">Commenter</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
