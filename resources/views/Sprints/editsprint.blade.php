<h1>Modifier le sprint</h1>

<form action="{{ route('sprints.update', $sprint->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom du sprint</label>
    <input type="text" name="name" value="{{ $sprint->name }}" class="form-control" required><br>

    <label>Date début</label>
    <input type="date" name="start_date" value="{{ $sprint->start_date }}" class="form-control" required><br>

    <label>Date fin</label>
    <input type="date" name="end_date" value="{{ $sprint->end_date }}" class="form-control" required><br>

    <button type="submit" class="btn btn-success">Mettre à jour</button>
</form>
