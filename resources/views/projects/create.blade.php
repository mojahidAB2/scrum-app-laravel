@extends('layouts.app')

@section('content')
<style>
body {
    background: #F9FAFB;
    min-height: 100vh;
    color: #111827;
    font-family: 'Segoe UI', sans-serif;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.form-wrapper {
    animation: fadeIn 0.6s ease;
    background: #ffffff;
    border-radius: 12px;
    padding: 2rem 2.5rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    border-top: 6px solid #3B82F6;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #3B82F6;
    text-align: center;
    margin-bottom: 1.5rem;
}

.grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media(min-width: 768px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.form-group {
    display: flex;
    flex-direction: column;
}

.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #111827;
}

.input-field,
.textarea-field,
select {
    padding: 0.6rem 1rem;
    border: 1px solid #788eaf;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
    background: #ffffff;
    color: #111827;
}

.input-field:hover,
.textarea-field:hover,
select:hover {
    border-color: #4f16aa;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.input-field:focus,
.textarea-field:focus,
select:focus {
    outline: none;
    border-color: #3B82F6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
}

.textarea-field {
    min-height: 120px;
    resize: vertical;
}

.actions {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.btn-primary {
    background: #3B82F6;
    color: white;
    font-weight: bold;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.btn-primary:hover {
    background: #2563EB;
}

.btn-link {
    background-color: transparent;
    color: #3B82F6;
    border: 1px solid #3B82F6;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}
.btn-link:hover {
    background-color: #E0F2FE;
    text-decoration: none;
}

/* Icône dans l'input */
.input-icon-wrapper {
    position: relative;
}
.input-icon-wrapper i {
    position: absolute;
    top: 50%;
    left: 12px;
    transform: translateY(-50%);
    color: #9CA3AF;
}
.input-icon-wrapper input {
    padding-left: 36px;
}
</style>


<div class="container">
    <div class="form-wrapper">
        <h2 class="title">Ajouter un nouveau projet</h2>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="grid">
                <!-- Nom avec icône -->
                <div class="form-group">
                    <label for="name">Nom du projet</label>
                    <div class="input-icon-wrapper">
                        <i class="fa fa-folder"></i>
                        <input type="text" name="name" id="name" required class="input-field">
                    </div>
                </div>

                <!-- Scrum Master -->
                <div class="form-group">
                    <label for="scrum_master">Scrum Master</label>
                    <input type="text" name="scrum_master" id="scrum_master" class="input-field">
                </div>

                <!-- Start -->
                <div class="form-group">
                    <label for="start_date">Date de début</label>
                    <input type="date" name="start_date" id="start_date" required class="input-field" value="{{ date('Y-m-d') }}">
                </div>

                <!-- End -->
                <div class="form-group">
                    <label for="end_date">Date de fin</label>
                    <input type="date" name="end_date" id="end_date" class="input-field">
                </div>

                <!-- Type -->
                <div class="form-group full-width">
                    <label for="project_type">Type de projet</label>
                    <select name="project_type" id="project_type" class="input-field" required>
                        <option disabled selected> Sélectionner </option>
                        <option>Site Web</option>
                        <option>Application Mobile</option>
                        <option>Data Science</option>
                        <option>Développement logiciel</option>
                        <option>Produit numérique</option>
                        <option>Transformation digitale</option>
                        <option>IA</option>
                        <option>Projet interne</option>
                        <option>Autre</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="textarea-field"></textarea>
                </div>
            </div>

            <!-- Boutons -->
            <div class="actions">
                <button type="submit" class="btn-primary">Enregistrer</button>
                <a href="{{ route('projects.index') }}" class="btn-link">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
