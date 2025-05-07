<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User Stories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 30px;
        }

        h2 {
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

        form input, form textarea {
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
    </style>
</head>
<body>

    <h2> Ajouter une nouvelle User Story</h2>

    <form action="/user-stories" method="POST">
        @csrf

        <label>Project ID</label>
        <input type="number" name="project_id" required>

        <label>Titre</label>
        <input type="text" name="titre" required>

        <label>En tant que...</label>
        <input type="text" name="en_tant_que" required>

        <label>Je veux...</label>
        <input type="text" name="je_veux" required>

        <label>Afin de...</label>
        <input type="text" name="afin_de" required>

        <button type="submit"> Enregistrer</button>
    </form>

    <h2> Liste des User Stories</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>En tant que</th>
                <th>Je veux</th>
                <th>Afin de</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userStories as $story)
                <tr>
                    <td>{{ $story->id }}</td>
                    <td>{{ $story->titre }}</td>
                    <td>{{ $story->en_tant_que }}</td>
                    <td>{{ $story->je_veux }}</td>
                    <td>{{ $story->afin_de }}</td>
                    <td>
                        <button class="btn btn-edit" onclick="toggleEditForm({{ $story->id }})"> Modifier</button>

                        <form method="POST" action="/user-stories/{{ $story->id }}" onsubmit="return confirm('Tu es sûr de vouloir supprimer cette User Story ?');" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"> Supprimer</button>
                        </form>
                    </td>
                </tr>

                <!--  Formulaire de modification -->
                <tr id="edit-form-{{ $story->id }}" style="display: none; background-color: #fff5f5;">
                    <td colspan="6">
                        <form method="POST" action="/user-stories/{{ $story->id }}">
                            @csrf
                            @method('PUT')

                            <label>Titre</label>
                            <input type="text" name="titre" value="{{ $story->titre }}" required>

                            <label>En tant que</label>
                            <input type="text" name="en_tant_que" value="{{ $story->en_tant_que }}" required>

                            <label>Je veux</label>
                            <input type="text" name="je_veux" value="{{ $story->je_veux }}" required>

                            <label>Afin de</label>
                            <input type="text" name="afin_de" value="{{ $story->afin_de }}" required>

                            <button type="submit" class="btn btn-edit"> Enregistrer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function toggleEditForm(id) {
            const formRow = document.getElementById('edit-form-' + id);
            formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>

</body>
</html>
