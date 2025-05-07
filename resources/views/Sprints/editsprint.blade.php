
h1>Modifier le sprint : {{ $sprint->name }}</h1>

<h1>Modifier le sprint : {{ $sprint->name }}</h1>


<form action="{{ route('sprints.update', $sprint->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom :</label>
    <input type="text" name="name" value="{{ $sprint->name }}" required><br><br>

    <label>Date début :</label>
    <input type="date" name="start_date" value="{{ $sprint->start_date }}" required><br><br>

    <label>Date fin :</label>
    <input type="date" name="end_date" value="{{ $sprint->end_date }}" required><br><br>

    <button type="submit">Mettre à jour</button>
</form>