@extends('layouts.guest')

@section('guest-content')

<form method="POST" action="{{ route('password.store') }}">
    @csrf

    {{-- Jeton pour la réinitialisation --}}
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    {{-- Adresse e-mail --}}
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Mot de passe --}}
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input id="password" type="password" name="password" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirmation du mot de passe --}}
    <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        @error('password_confirmation')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Bouton envoyer --}}
    <button type="submit"
        class="w-full bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold py-2 px-4 rounded">
        Réinitialiser le mot de passe
    </button>
</form>

@endsection
