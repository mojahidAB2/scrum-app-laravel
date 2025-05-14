<h1>Créer un sprint pour le projet : {{ $project->name }}</h1>

<form action="{{ route('sprints.store', $project->id) }}" method="POST">
    @csrf
    <label>Nom du sprint</label>
    <input type="text" name="name" class="form-control" required><br>

    <label>Date début</label>
    <input type="date" name="start_date" class="form-control" required><br>

    <label>Date fin</label>
    <input type="date" name="end_date" class="form-control" required><br>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>
