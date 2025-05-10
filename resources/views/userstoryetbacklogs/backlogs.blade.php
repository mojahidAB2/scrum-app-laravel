<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Backlogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">

    {{-- ✅ Titre --}}
    <h2 class="mb-4 text-center text-primary"> Liste des Backlogs</h2>

    {{-- ➕ Formulaire d’ajout --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">Ajouter un nouveau Backlog</div>
        <div class="card-body">
            <form method="POST" action="{{ route('backlogs.store') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Project ID</label>
                        <input type="number" name="project_id" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Titre</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>

                {{-- 🔽 Select User Story --}}
                <div class="mb-3">
                    <label for="user_story_id" class="form-label">Associer à une User Story</label>
                    <select name="user_story_id" id="user_story_id" class="form-select">
                        <option value="">-- Sélectionner --</option>
                        @foreach ($userStories as $story)
                            <option value="{{ $story->id }}">{{ $story->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
            </form>
        </div>
    </div>

    {{-- 📄 Tableau des Backlogs --}}
    <table class="table table-hover table-bordered shadow-sm">
        <thead class="table-primary">
            <tr class="text-center">
                <th>ID</th>
                <th>Project ID</th>
                <th>User Story</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($backlogs as $backlog)
                <tr class="text-center">
                    <td>{{ $backlog->id }}</td>
                    <td>{{ $backlog->project_id }}</td>
                    <td>{{ $backlog->userStory->titre ?? '—' }}</td>
                    <td>{{ $backlog->titre }}</td>
                    <td>{{ $backlog->description }}</td>
                    <td>
                        <a href="{{ route('backlogs.edit', $backlog->id) }}" class="btn btn-warning btn-sm me-2">Modifier</a>

                        <form method="POST" action="{{ route('backlogs.destroy', $backlog->id) }}" style="display:inline-block">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce backlog ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
