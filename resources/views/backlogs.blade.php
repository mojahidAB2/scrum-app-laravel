<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Backlogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 30px;
        }

        h2, h3 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        form input, form textarea, form select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4a90e2;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-delete {
            background-color: #d9534f;
            color: white;
        }

        .btn-edit:hover {
            background-color: #ec971f;
        }

        .btn-delete:hover {
            background-color: #c9302c;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>➕ Ajouter une tâche au Backlog</h2>

    <form action="/backlogs" method="POST">
        @csrf

        <label>Project ID</label>
        <input type="number" name="project_id" required>

        <label>Titre</label>
        <input type="text" name="titre" required>

        <label>Description</label>
        <input type="text" name="description">

        <label>Priorité</label>
        <select name="priorite" required>
            <option value="haute">Haute</option>
            <option value="moyenne" selected>Moyenne</option>
            <option value="faible">Faible</option>
        </select>

        <label>Statut</label>
        <select name="statut" required>
            <option value="à faire" selected>À faire</option>
            <option value="en cours">En cours</option>
            <option value="terminé">Terminé</option>
        </select>

        <label>Date d'échéance</label>
        <input type="date" name="date_echeance">

        <button type="submit">✅ Enregistrer</button>
    </form>

    <h3>🔎 Filtrer les tâches</h3>

    <form method="GET" action="/backlogs-view" style="margin-bottom: 30px;">
        <label>Priorité:</label>
        <select name="priorite">
            <option value="">-- Tous --</option>
            <option value="haute" {{ request('priorite') == 'haute' ? 'selected' : '' }}>Haute</option>
            <option value="moyenne" {{ request('priorite') == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
            <option value="faible" {{ request('priorite') == 'faible' ? 'selected' : '' }}>Faible</option>
        </select>

        <label>Statut:</label>
        <select name="statut">
            <option value="">-- Tous --</option>
            <option value="à faire" {{ request('statut') == 'à faire' ? 'selected' : '' }}>À faire</option>
            <option value="en cours" {{ request('statut') == 'en cours' ? 'selected' : '' }}>En cours</option>
            <option value="terminé" {{ request('statut') == 'terminé' ? 'selected' : '' }}>Terminé</option>
        </select>

        <label>Trier par date:</label>
        <select name="sort">
            <option value="">-- Aucun --</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Date ↑</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Date ↓</option>
        </select>

        <button type="submit">🔍 Appliquer</button>
    </form>

    <h2>📋 Liste des Backlogs</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Priorité</th>
                <th>Statut</th>
                <th>Date échéance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($backlogs as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->titre }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->priorite }}</td>
                    <td>{{ $task->statut }}</td>
                    <td>{{ $task->date_echeance }}</td>
                    <td>
                        <button class="btn btn-edit" onclick="toggleEditForm({{ $task->id }})">✏️ Modifier</button>

                        <form method="POST" action="/backlogs/{{ $task->id }}" onsubmit="return confirm('Supprimer cette tâche ?');" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">🗑️ Supprimer</button>
                        </form>
                    </td>
                </tr>

                <!-- Formulaire de modification -->
                <tr id="edit-form-{{ $task->id }}" style="display: none; background-color: #fff5f5;">
                    <td colspan="7">
                        <form method="POST" action="/backlogs/{{ $task->id }}">
                            @csrf
                            @method('PUT')

                            <label>Titre</label>
                            <input type="text" name="titre" value="{{ $task->titre }}" required>

                            <label>Description</label>
                            <input type="text" name="description" value="{{ $task->description }}">

                            <label>Priorité</label>
                            <select name="priorite" required>
                                <option value="haute" {{ $task->priorite === 'haute' ? 'selected' : '' }}>Haute</option>
                                <option value="moyenne" {{ $task->priorite === 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                                <option value="faible" {{ $task->priorite === 'faible' ? 'selected' : '' }}>Faible</option>
                            </select>

                            <label>Statut</label>
                            <select name="statut" required>
                                <option value="à faire" {{ $task->statut === 'à faire' ? 'selected' : '' }}>À faire</option>
                                <option value="en cours" {{ $task->statut === 'en cours' ? 'selected' : '' }}>En cours</option>
                                <option value="terminé" {{ $task->statut === 'terminé' ? 'selected' : '' }}>Terminé</option>
                            </select>

                            <label>Date d'échéance</label>
                            <input type="date" name="date_echeance" value="{{ $task->date_echeance }}">

                            <button type="submit" class="btn btn-edit">💾 Enregistrer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $backlogs->links() }}
    </div>

    <script>
        function toggleEditForm(id) {
            const formRow = document.getElementById('edit-form-' + id);
            formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>

</body>
</html>
