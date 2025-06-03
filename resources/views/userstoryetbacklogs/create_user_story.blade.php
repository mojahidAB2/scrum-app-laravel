@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 mt-8">

    {{-- 🔵 Titre --}}
    <h2 class="text-2xl font-bold text-[#4A249D] text-center mb-6">➕ Ajouter une User Story</h2>

    {{-- ➕ Formulaire --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <form method="POST" action="{{ route('user_stories.store') }}" class="grid grid-cols-1 gap-4">
            @csrf

            <input type="number" name="project_id" placeholder="ID du projet" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="titre" placeholder="Titre de la User Story" required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="en_tant_que" placeholder="En tant que..." required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="je_veux" placeholder="Je veux..." required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <input type="text" name="afin_de" placeholder="Afin de..." required
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-purple-500 focus:border-purple-500">

            <div class="text-end">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
