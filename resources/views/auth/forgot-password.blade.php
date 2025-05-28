@extends('layouts.guest')

@section('guest-content')

    <h2 class="text-xl font-semibold text-center text-[#ba3dd1] mb-4">
        Mot de passe oublié ?
    </h2>

    <p class="text-sm text-gray-600 mb-6 text-center">
        Pas de souci. Entrez votre adresse e-mail et on vous enverra un lien pour réinitialiser votre mot de passe.
    </p>

    {{-- Statut de la session --}}
    @if (session('status'))
        <div class="mb-4 text-sm text-green-600 font-medium">
            {{ session('status') }}
        </div>
    @endif

    {{-- Formulaire d'envoi du lien --}}
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        {{-- Adresse e-mail --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bouton envoyer --}}
        <button type="submit"
            class="w-full bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold py-2 px-4 rounded">
            Envoyer le lien de réinitialisation
        </button>
    </form>

@endsection
