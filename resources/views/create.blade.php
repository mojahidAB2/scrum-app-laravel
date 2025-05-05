<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style1.css">

</head>
<style>

    .titre{
        color:rgb(5, 10, 113);
        margin-left: 37%;
    }
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 40px;
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 600px;
    margin: auto;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

form div {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color:rgb(9, 11, 136);
}

input[type="text"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color:rgb(49, 13, 255);
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color:rgb(66, 32, 255);
}
</style>

<body>
    <div>
    <h1 class="titre">Créer un projet Scrum</h1>
    </div>
    <form action="/projects" method="POST"> 
    @csrf
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
        <label for="team">Créer une équipe Scrum</label> <br>
        <div>
            <label for="team_name">Nom de l'équipe</label>
            <input type="text" name="team_name" id="team_name" required>
        </div>

        <div>
            <label for="scrum_master_id">Scrum Master</label>
            <input type="text" id="master" name="master" required> 
        </div>

        <div>
            <label for="product_owner_id">Product Owner</label>
            <input type="text" id="owner" name="owner" required> 
        </div>

        <div>
            <label for="developer_ids">Développeurs</label>
            <input type="text" id="dev" name="dev" required> 
        </div>

       
    

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