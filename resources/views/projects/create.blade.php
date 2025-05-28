@extends('layouts.app')

@section('content')
<style>
/* Container centré avec max-width et padding */
.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

/* Carte blanche avec ombre et padding */
.form-wrapper {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    padding: 1.5rem 2rem;
}

/* Titre */
.title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #ba3dd1;
    margin-bottom: 1.5rem;
}

/* Grid 2 colonnes sur desktop, 1 colonne sur mobile */
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

/* Groupe de champ */
.form-group {
    display: flex;
    flex-direction: column;
}

/* Champ qui prend toute la largeur (description) */
.full-width {
    grid-column: 1 / -1;
}

/* Label */
.form-group label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

/* Input / textarea styles */
.input-field, .textarea-field {
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 1rem;
    font-family: inherit;
    color: #111827;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.input-field:focus, .textarea-field:focus {
    outline: none;
    border-color: #f18ac5;
    box-shadow: 0 0 0 3px rgba(241, 138, 197, 0.3);
}

/* Textarea hauteur ajustée */
.textarea-field {
    resize: vertical;
    min-height: 100px;
}

/* Actions boutons */
.actions {
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
}

/* Bouton principal */
.btn-primary {
    background-color: #ba3dd1;
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.btn-primary:hover {
    background-color: #a92dc0;
}

/* Lien annuler */
.btn-link {
    margin-left: 1rem;
    color: #f18ac5;
    text-decoration: none;
    font-weight: 500;
    transition: text-decoration 0.2s ease;
}

.btn-link:hover {
    text-decoration: underline;
}
</style>

<div class="container">
    <div class="form-wrapper">
        <h2 class="title">Ajouter un nouveau projet</h2>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="grid">
                {{-- Nom du projet --}}
                <div class="form-group">
                    <label for="name">Nom du projet</label>
                    <input type="text" name="name" id="name" required class="input-field">
                </div>

                {{-- Scrum Master --}}
                <div class="form-group">
                    <label for="scrum_master">Scrum Master</label>
                    <input type="text" name="scrum_master" id="scrum_master" class="input-field">
                </div>

                {{-- Date de début --}}
                <div class="form-group">
                    <label for="start_date">Date de début</label>
                    <input type="date" name="start_date" id="start_date" required class="input-field" value="{{ date('Y-m-d') }}">

                </div>

                {{-- Date de fin --}}
                <div class="form-group">
                    <label for="end_date">Date de fin</label>
                    <input type="date" name="end_date" id="end_date" class="input-field">
                </div>
                   





            
                {{-- Type de projet --}}
                <div class="form-group">
                    <label for="project_type">Type de projet</label>
                    <select name="project_type" id="project_type" class="input-field" required>
                        <option value="" disabled selected>-- Sélectionner --</option>
                        <option value="site_web">Site Web</option>
                        <option value="application_mobile">Application Mobile</option>
                        <option value="data_science">Data Science</option>
                        <option value="Développement logiciel">Développement logiciel</option>
                        <option value="Produit numérique">Produit numérique</option>
                        <option value="Transformation digitale">Transformation digitale</option>
                        <option value="IA">Intelligence Artificielle</option>
                        <option value="Projet interne">Projet interne</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>




                {{-- Description --}}
                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" class="textarea-field"></textarea>
                </div>
            </div>

            <div class="actions">
                <button type="submit" class="btn-primary">Enregistrer</button>
                <a href="{{ route('projects.index') }}" class="btn-link">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
