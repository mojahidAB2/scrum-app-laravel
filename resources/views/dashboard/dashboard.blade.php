@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Carte: Nombre de projets --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 text-center transition hover:shadow-lg hover:scale-105 duration-200">
        <h3 class="text-xl font-semibold text-[#ba3dd1] dark:text-[#f18ac5]">Projets</h3>
        <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $projectsCount }}</p>
    </div>

    {{-- Carte: Nombre de tâches --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 text-center transition hover:shadow-lg hover:scale-105 duration-200">
        <h3 class="text-xl font-semibold text-[#ba3dd1] dark:text-[#f18ac5]">Tâches Assignées</h3>
        <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $tasksCount }}</p>
    </div>

    {{-- Carte: Sprints en cours --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 text-center transition hover:shadow-lg hover:scale-105 duration-200">
        <h3 class="text-xl font-semibold text-[#ba3dd1] dark:text-[#f18ac5]">Sprints en cours</h3>
        <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ $sprintsActifs }}</p>
    </div>

</div>
@endsection
