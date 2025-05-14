

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter des membres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (nécessaire) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>
<body class="container mt-4">

   <h2>Ajouter des membres au projet : {{ $projet->name }}</h2>

<form action="{{ route('projects.updateMembers', $projet->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="users" class="form-label">Sélectionnez les membres :</label>
       <select name="users[]" multiple class="form-control select2" required>
    @foreach($users as $user)
        <option value="{{ $user->id }}"
            {{ $projet->userss->contains($user->id) ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach
</select>

    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>








<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Sélectionnez des membres",
            width: '100%'
        });
    });
</script>


</body>
</html>

