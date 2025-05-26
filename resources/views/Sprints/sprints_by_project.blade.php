@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto mt-10 bg-gray-800 text-white rounded-xl shadow-lg p-8">

    <h2 class="text-2xl font-bold mb-6 text-white">Sprints du Projet {{ $projectId }}</h2>

    @if ($sprints->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-4 text-sm">
            Aucun sprint disponible.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-center border border-gray-700 rounded">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Date début</th>
                        <th class="px-4 py-3">Date fin</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach ($sprints as $sprint)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ $sprint->id }}</td>
                            <td class="px-4 py-2">{{ $sprint->name }}</td>
                            <td class="px-4 py-2">{{ $sprint->start_date }}</td>
                            <td class="px-4 py-2">{{ $sprint->end_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('projects.show', $projectId) }}"
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded">
            Retour au projet
        </a>
    </div>
</div>

@endsection
