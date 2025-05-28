@extends('layouts.guest') {{-- Layout de base pour les visiteurs non connectés --}}

@section('guest-content')

    <!-- 🔵 Titre principal -->
    <h2 class="text-2xl font-bold text-center text-[#27548A] mb-6">Créer un compte</h2>

    <!-- 📄 Formulaire d’inscription -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- 🔤 Nom --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[#183B4E]">Nom</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="mt-1 block w-full rounded-md border-[#DDA853] shadow-sm focus:ring-[#27548A] focus:border-[#27548A] bg-[#F5EEDC] text-[#183B4E]">
        </div>

        {{-- 📧 Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-[#183B4E]">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full rounded-md border-[#DDA853] shadow-sm focus:ring-[#27548A] focus:border-[#27548A] bg-[#F5EEDC] text-[#183B4E]">
        </div>

        {{-- 🔒 Mot de passe --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-[#183B4E]">Mot de passe</label>
            <input id="password" type="password" name="password" required
                class="mt-1 block w-full rounded-md border-[#DDA853] shadow-sm focus:ring-[#27548A] focus:border-[#27548A] bg-[#F5EEDC] text-[#183B4E]">
        </div>

        {{-- 🔐 Confirmation du mot de passe --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-[#183B4E]">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="mt-1 block w-full rounded-md border-[#DDA853] shadow-sm focus:ring-[#27548A] focus:border-[#27548A] bg-[#F5EEDC] text-[#183B4E]">
        </div>

        {{-- ✅ Bouton de validation --}}
        <button type="submit"
            class="w-full bg-[#DDA853] hover:bg-[#183B4E] text-black font-semibold py-2 px-4 rounded transition">
            S'inscrire
        </button>
    </form>

    <!-- 🔁 Lien vers la connexion -->
    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm text-[#27548A] hover:underline">
            Déjà inscrit ? Se connecter
        </a>
    </div>
@endsection
