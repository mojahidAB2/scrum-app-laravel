



<h1>Créer un sprint pour le projet : {{ $project->name }}</h1>

<form action="{{ route('sprints.store', $project->id) }}" method="POST">
    @csrf
    <label for="name">Nom du sprint</label>
    <input type="text" name="name" required><br><br>

    <label for="start_date">Date de début</label>
    <input type="date" name="start_date" required><br><br>

    <label for="end_date">Date de fin</label>
    <input type="date" name="end_date" required><br><br>

    <button type="submit">Créer le sprint</button>
</form>
