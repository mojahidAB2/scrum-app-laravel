<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier User Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">

    <h2 class="mb-4 text-center text-warning"> Modifier la User Story</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('user_stories.update', $story->id) }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="project_id" class="form-label">Project ID</label>
                        <input type="number" id="project_id" name="project_id" class="form-control" value="{{ $story->project_id }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" value="{{ $story->titre }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="en_tant_que" class="form-label">En tant que</label>
                        <input type="text" id="en_tant_que" name="en_tant_que" class="form-control" value="{{ $story->en_tant_que }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="je_veux" class="form-label">Je veux</label>
                        <input type="text" id="je_veux" name="je_veux" class="form-control" value="{{ $story->je_veux }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="afin_de" class="form-label">Afin de</label>
                        <input type="text" id="afin_de" name="afin_de" class="form-control" value="{{ $story->afin_de }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"> Enregistrer les modifications</button>
                <a href="{{ route('user_stories.view') }}" class="btn btn-secondary ms-2"> Retour</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>
