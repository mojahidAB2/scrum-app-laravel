@extends('layouts.guest') {{-- ou 'layouts.guest' si ton fichier s'appelle guest.blade.php et tu l'as mis dans layouts/ --}}

@section('guest-content')
    <h2 class="text-2xl font-bold text-center text-[#ba3dd1] mb-6">Créer un compte</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nom --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input id="password" type="password" name="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Confirm password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold py-2 px-4 rounded">
            S'inscrire
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm text-[#f18ac5] hover:underline">
            Déjà inscrit ? Se connecter
        </a>
    </div>
@endsection
