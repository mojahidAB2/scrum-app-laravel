@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-gray-800 text-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold text-center mb-6">Créer un sprint pour le projet : {{ $project->name }}</h1>

    <form action="{{ route('sprints.store', $project->id) }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-200 mb-1">Nom du sprint</label>
            <input type="text" name="name" id="name" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-200 mb-1">Date début</label>
            <input type="date" name="start_date" id="start_date" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-200 mb-1">Date fin</label>
            <input type="date" name="end_date" id="end_date" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition duration-200">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection
