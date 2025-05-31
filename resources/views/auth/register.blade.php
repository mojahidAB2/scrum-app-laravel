@extends('layouts.guest') {{-- Layout de base invité --}}

@section('guest-content')

    <!-- Titre du formulaire -->
    <h2 class="text-center text-blue-main fw-bold mb-4" data-aos="fade-down">
        Créer un compte
    </h2>

    <!-- Formulaire d'inscription -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Champ Nom -->
        <div class="mb-3" data-aos="fade-up">
            <label for="name" class="form-label text-blue-dark">Nom</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="form-control bg-beige border-gold text-blue-dark shadow-sm transition">
        </div>

        <!-- Champ Email -->
        <div class="mb-3" data-aos="fade-up" data-aos-delay="100">
            <label for="email" class="form-label text-blue-dark">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="form-control bg-beige border-gold text-blue-dark shadow-sm transition">
        </div>

        <!-- Champ Mot de passe -->
        <div class="mb-3" data-aos="fade-up" data-aos-delay="200">
            <label for="password" class="form-label text-blue-dark">Mot de passe</label>
            <input id="password" type="password" name="password" required
                   class="form-control bg-beige border-gold text-blue-dark shadow-sm transition">
        </div>

        <!-- Champ Confirmation mot de passe -->
        <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
            <label for="password_confirmation" class="form-label text-blue-dark">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="form-control bg-beige border-gold text-blue-dark shadow-sm transition">
        </div>

        <!-- Bouton Inscription -->
        <div data-aos="zoom-in" data-aos-delay="400">
            <button type="submit"
                    class="btn w-100 bg-gold text-blue-dark fw-semibold py-2 rounded shadow-sm hover-scale">
                S’inscrire
            </button>
        </div>

        <!-- Lien vers connexion -->
        <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('login') }}" class="text-sm text-blue-main hover-underline">
                Déjà inscrit ? Se connecter
            </a>
        </div>
    </form>
@endsection
