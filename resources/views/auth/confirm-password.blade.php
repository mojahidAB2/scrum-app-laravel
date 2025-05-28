@extends('layouts.guest')

@section('guest-content')

    <h2 class="text-xl font-semibold text-center text-[#ba3dd1] mb-4">
        Confirmation du mot de passe
    </h2>

    <p class="text-sm text-gray-600 mb-6 text-center">
        Ceci est une zone sécurisée. Veuillez confirmer votre mot de passe avant de continuer.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        {{-- Mot de passe --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input id="password" type="password" name="password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bouton --}}
        <button type="submit"
                class="w-full bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold py-2 px-4 rounded">
            Confirmer
        </button>
    </form>

@endsection
