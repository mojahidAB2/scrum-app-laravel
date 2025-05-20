@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold text-[#ba3dd1] mb-6">Modifier le Projet</h1>

    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom du projet</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">{{ $project->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
        </div>

        <div class="mb-6">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
        </div>

        <button type="submit"
            class="bg-[#ba3dd1] text-white px-4 py-2 rounded hover:bg-[#a126b6] transition">Enregistrer les modifications</button>
    </form>
</div>
@endsection
