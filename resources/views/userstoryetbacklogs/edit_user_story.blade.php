@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold text-center text-[#ba3dd1] mb-8"> Modifier la User Story</h2>

    <form method="POST" action="{{ route('user_stories.update', $story->id) }}" class="bg-white shadow-lg rounded-xl p-6 space-y-4">
        @csrf
        @method('PUT') {{-- Obligatoire pour que Laravel traite le formulaire comme update --}}

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Project ID</label>
                <input type="number" name="project_id" value="{{ $story->project_id }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="titre" value="{{ $story->titre }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">En tant que</label>
                <input type="text" name="en_tant_que" value="{{ $story->en_tant_que }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Je veux</label>
                <input type="text" name="je_veux" value="{{ $story->je_veux }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Afin de</label>
                <input type="text" name="afin_de" value="{{ $story->afin_de }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('user_stories.view') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
                 Retour
            </a>
            <button type="submit"
                class="bg-[#ba3dd1] hover:bg-[#a72abc] text-white px-6 py-2 rounded shadow">
                 Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
