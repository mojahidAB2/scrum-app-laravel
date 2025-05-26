@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-12 bg-gray-800 text-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Modifier le sprint</h1>

    <form action="{{ route('sprints.update', $sprint->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-200 mb-1">Nom du sprint</label>
            <input type="text" name="name" id="name" value="{{ $sprint->name }}" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-200 mb-1">Date début</label>
            <input type="date" name="start_date" id="start_date" value="{{ $sprint->start_date }}" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-200 mb-1">Date fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ $sprint->end_date }}" required
                class="w-full rounded-md bg-gray-700 text-white border border-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-md transition duration-200">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
