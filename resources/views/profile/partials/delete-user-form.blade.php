@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold text-red-600 mb-4">Supprimer le compte</h2>

    <p class="text-gray-600 mb-6">
        Une fois votre compte supprimé, toutes vos données seront définitivement perdues.
        Veuillez entrer votre mot de passe pour confirmer la suppression.
    </p>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        {{-- Mot de passe --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">Annuler</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Supprimer définitivement
            </button>
        </div>
    </form>
</div>
@endsection
