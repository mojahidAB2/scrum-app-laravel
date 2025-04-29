<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h1>Créer un projet Scrum</h1>
    </div>
    <form action="/projects" method="POST"> 
        <div>
        <label for="name">Nom du projet</label> <br>
        <input type="text" id="name" name="name" required> 
        </div>
        <div>
        <label for="description">Description</label> <br>
        <textarea id="description" name="description" rows="3"></textarea> 
        </div>
        <div>
        <label for="start_date">Date de début</label> <br>
        <input type="date" id="start_date" name="start_date" required> 
        </div>
        <div>
        <label for="end_date">Date de fin</label> <br>
        <input type="date" id="end_date" name="end_date" required> 
        </div>
        <div>
        <label for="team">Membre associé</label> <br>
        <a href="{{ route('teams') }}">Créer team</a>
        </div>
        <div>
        <label for="vision">Vision du projet</label> <br>
        <input type="text" id="vision" name="vision" required> 
        </div>
        <div>
        <label for="status" >Statut du projet :</label>
    <select name="status" id="status" required>
        <option value="">Sélectionnez un statut</option>
        <option value="en_cours">En cours</option>
        <option value="termine">Terminé</option>
        <option value="suspendu">Suspendu</option>
    </select>
        </div>




<button type="submit">Créer le projet</button> 
<button type="submit">Créer le projet</button> 
</form> 
</div>
    
</body>
</html>