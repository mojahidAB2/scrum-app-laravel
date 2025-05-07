<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le projet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier le projet : {{ $project->name }}</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom du projet</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $project->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="scrum_master">Scrum Master</label>
                <input type="text" name="scrum_master" id="scrum_master" class="form-control" value="{{ old('scrum_master', $project->scrum_master) }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $project->start_date) }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $project->end_date) }}" required>
            </div>

          

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


