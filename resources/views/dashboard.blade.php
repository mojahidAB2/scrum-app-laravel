@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">
    <h2 class="text-3xl font-bold mb-6"> Bonjour, {{ auth()->user()->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600"> Projets</p>
            <h3 class="text-4xl font-bold text-blue-600">{{ $projectsCount }}</h3>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600"> Tâches assignées</p>
            <h3 class="text-4xl font-bold text-green-600">{{ $tasksCount }}</h3>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600"> Sprints actifs</p>
            <h3 class="text-4xl font-bold text-yellow-600">{{ $sprintsActifs }}</h3>
        </div>
    </div>
</div>
@endsection
