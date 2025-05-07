<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nom du projet :</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="start_date">Date de début :</label>
        <input type="date" id="start_date" name="start_date" required>
    </div>
    <div>
        <label for="end_date">Date de fin :</label>
        <input type="date" id="end_date" name="end_date" required>
    </div>
    <div>
        <label for="scrum_master">Scrum Master :</label>
        <input type="text" id="scrum_master" name="scrum_master" required>
    </div>
   
    <div>
        <label for="priority">Priorité :</label>
        <select id="priority" name="priority">
            <option value="haute">Haute</option>
            <option value="moyenne">Moyenne</option>
            <option value="basse">Basse</option>
        </select>
    </div>
    <div>
        <label for="project_type">Type de projet :</label>
        <input type="text" id="project_type" name="project_type">
    </div>
    <div>
        <label for="main_goals">Objectifs principaux :</label>
        <textarea id="main_goals" name="main_goals"></textarea>
    </div>
    <button type="submit">Créer le projet</button>
</form>


