@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

/* Animation */
.form-wrapper {
    animation: fadeIn 0.6s ease;
    background: linear-gradient(to bottom right, #ffd6e0, #ffb3c6, #fbb1ff);
    border-radius: 12px;
    padding: 2rem 2.5rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    border-top: 6px solid #E84A5F;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #6A0572;
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
    color: #333;
}

.input-field,
.textarea-field,
select {
    padding: 0.6rem 1rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

/* Hover */
.input-field:hover,
.textarea-field:hover,
select:hover {
    border-color: #ba3dd1;
    box-shadow: 0 0 0 3px rgba(186, 61, 209, 0.1);
}

.input-field:focus,
.textarea-field:focus,
select:focus {
    outline: none;
    border-color: #FF8400;
    box-shadow: 0 0 0 3px rgba(255,132,0,0.3);
}

.textarea-field {
    min-height: 120px;
    resize: vertical;
}

/* Buttons */
.actions {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.btn-primary {
    background: linear-gradient(to right, #E84A5F, #6A0572);
    color: white;
    font-weight: bold;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.btn-primary:hover {
    background: linear-gradient(to right, #6A0572, #E84A5F);
}

.btn-link {
    background-color: transparent;
    color: #E84A5F;
    border: 1px solid #E84A5F;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}
.btn-link:hover {
    background-color: #ffe3ec;
    text-decoration: none;
}

/* Icon inside input */
.input-icon-wrapper {
    position: relative;
}
.input-icon-wrapper i {
    position: absolute;
    top: 50%;
    left: 12px;
    transform: translateY(-50%);
    color: #aaa;
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
                        <option disabled selected>-- Sélectionner --</option>
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
