@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}

.container {
    max-width: 768px;
    margin: 3rem auto;
    padding: 2.5rem;
    background: linear-gradient(to bottom right, #ffd6e0, #ffb3c6, #fbb1ff);
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.title {
    font-size: 2rem;
    font-weight: bold;
    color: #6A0572;
    text-align: center;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.25rem;
}

.form-group select,
.form-group input {
    width: 100%;
    padding: 0.6rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input:focus,
select:focus {
    outline: none;
    border-color: #FF8400;
    box-shadow: 0 0 0 3px rgba(255,132,0,0.25);
}

.button-submit {
    display: flex;
    justify-content: flex-end;
    margin-top: 1.5rem;
}

.btn-submit {
    background: linear-gradient(to right, #E84A5F, #6A0572);
    color: white;
    font-weight: bold;
    padding: 0.6rem 2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.btn-submit:hover {
    background: linear-gradient(to right, #6A0572, #E84A5F);
}
</style>

<div class="container">
    <h2 class="title">Ajouter une User Story</h2>

    <form method="POST" action="{{ route('user_stories.store') }}">
        @csrf

        <div class="form-group">
            <select name="project_id" required>
                <option value="">Sélectionner un projet</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="text" name="titre" placeholder="Titre de la User Story" required>
        </div>

        <div class="form-group">
            <input type="text" name="en_tant_que" placeholder="En tant que..." required>
        </div>

        <div class="form-group">
            <input type="text" name="je_veux" placeholder="Je veux..." required>
        </div>

        <div class="form-group">
            <input type="text" name="afin_de" placeholder="Afin de..." required>
        </div>

        <div class="button-submit">
            <button type="submit" class="btn-submit">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
