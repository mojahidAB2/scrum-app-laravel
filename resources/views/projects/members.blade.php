<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter des membres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Ajouter des membres au projet : {{ $projet->name }}</h2>

    <form action="{{ route('projects.updateMembers', $projet->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="users" class="form-label">Sélectionnez les membres :</label>
            <select name="users[]" multiple class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $projet->users->contains($user->id) ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('projects.show', $projet->id) }}" class="btn btn-secondary">Retour</a>
    </form>

</body>
</html>
