<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User Stories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h2 class="mb-4 text-center text-primary"> Liste des User Stories</h2>

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
</div>
<div>


    <h2>{{ $story->titre }}</h2>

<h4>Commentaires :</h4>
@foreach($story->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }} :</strong> {{ $comment->content }}
        <small>{{ $comment->created_at->diffForHumans() }}</small>
    </div>
@endforeach

<form action="{{ route('comments.store', ['type' => 'userstory', 'id' => $story->id]) }}" method="POST">
    @csrf
    <textarea name="content" rows="2" required></textarea>
    <button type="submit">Commenter</button>
</form>
</div>
</form>
</body>
</html>
