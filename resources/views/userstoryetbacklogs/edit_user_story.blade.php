@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #FFD93D, #FF8400, #E84A5F, #6A0572);
    min-height: 100vh;
}
.form-card {
    background: linear-gradient(to bottom right, #fbe4f1, #f6d0eb, #f0c3e3);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    border-radius: 1rem;
    padding: 2rem;
}
h2.title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #6A0572;
    text-align: center;
    margin-bottom: 1.5rem;
}
label {
    font-weight: 500;
    color: #4b5563;
}
input {
    border-radius: 8px;
    border: 1px solid #d1d5db;
}
input:focus {
    border-color: #ba3dd1;
    box-shadow: 0 0 0 3px rgba(186, 61, 209, 0.3);
    outline: none;
}
.btn-primary {
    background-color: #ba3dd1;
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
}
.btn-primary:hover {
    background-color: #9c2bbf;
}
.btn-secondary {
    background-color: #f3f4f6;
    color: #333;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
}
.btn-secondary:hover {
    background-color: #e5e7eb;
}
</style>

<div class="max-w-5xl mx-auto py-10 px-6">
    <h2 class="title">Modifier la User Story</h2>

   <form method="POST" action="{{ route('user_stories.update', $story->id) }}">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Affichage du nom du projet (readonly) --}}
            <div>
                <label>Projet</label>
                <input type="text" value="{{ $story->project->name ?? 'Projet inconnu' }}" disabled
                       class="w-full px-3 py-2 mt-1 bg-gray-100 text-gray-700 cursor-not-allowed">
                <input type="hidden" name="project_id" value="{{ $story->project_id }}">
            </div>

            <div>
                <label>Titre</label>
                <input type="text" name="titre" value="{{ $story->titre }}" required
                       class="w-full px-3 py-2 mt-1">
            </div>

            <div>
                <label>En tant que</label>
                <input type="text" name="en_tant_que" value="{{ $story->en_tant_que }}" required
                       class="w-full px-3 py-2 mt-1">
            </div>

            <div>
                <label>Je veux</label>
                <input type="text" name="je_veux" value="{{ $story->je_veux }}" required
                       class="w-full px-3 py-2 mt-1">
            </div>

            <div class="md:col-span-2">
                <label>Afin de</label>
                <input type="text" name="afin_de" value="{{ $story->afin_de }}" required
                       class="w-full px-3 py-2 mt-1">
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('user_stories.view') }}" class="btn-secondary">Retour</a>
            <button type="submit" class="btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
