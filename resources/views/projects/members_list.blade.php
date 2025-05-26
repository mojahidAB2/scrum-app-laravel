@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-gray-900 text-white p-8 rounded-lg shadow-xl">

    {{-- 🟪 Titre --}}
    <h2 class="text-2xl font-bold text-yellow-400 mb-6">
        Membres du projet : {{ $projet->name }}
    </h2>

    {{-- 📋 Liste des membres --}}
    @if ($projet->users->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 text-sm p-4 rounded-md">
            Aucun membre affecté à ce projet.
        </div>
    @else
        <ul class="space-y-3">
            @foreach ($projet->users as $user)
                <li class="flex justify-between items-center bg-gray-700 hover:bg-gray-600 p-4 rounded-md transition">
                    <span class="font-medium">{{ $user->name }}</span>
                    <span class="text-sm text-gray-300">{{ $user->email }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    {{-- 🔙 Bouton retour --}}
    <div class="mt-8">
        <a href="{{ route('projects.show', $projet->id) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-semibold transition">
            ← Retour au projet
        </a>
    </div>
</div>
@endsection
