<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Backlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">

    <h2 class="mb-4 text-center text-warning">✏️ Modifier un Backlog</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('backlogs.update', $backlog->id) }}">
                @csrf

                <div class="mb-3">
                    <label>Project ID</label>
                    <input type="number" name="project_id" class="form-control" value="{{ $backlog->project_id }}" required>
                </div>

                <div class="mb-3">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control" value="{{ $backlog->titre }}" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $backlog->description }}" required>
                </div>

                <div class="mb-3">
                    <label for="user_story_id" class="form-label">Associer à une User Story</label>
                    <select name="user_story_id" class="form-select">
                        <option value="">-- Aucune --</option>
                        @foreach ($userStories as $story)
                            <option value="{{ $story->id }}" {{ $backlog->user_story_id == $story->id ? 'selected' : '' }}>
                                {{ $story->titre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"> Enregistrer</button>
                <a href="{{ route('backlogs.view') }}" class="btn btn-secondary ms-2">↩️ Retour</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>
