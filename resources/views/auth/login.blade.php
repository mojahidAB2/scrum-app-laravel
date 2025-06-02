@extends('layouts.guest')
 {{-- tu étends guest.blade.php classique --}}

@section('guest-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input id="email" type="email" name="email" required autofocus
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Password --}}
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input id="password" type="password" name="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full bg-[#320a39] hover:bg-[#657318] text-white font-semibold py-2 px-4 rounded">
            Connexion
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('register') }}" class="text-sm text-[#f18ac5] hover:underline">
            Pas encore de compte ? S’inscrire
        </a>
    </div>
@endsection
