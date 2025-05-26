@extends('layouts.app')

@section('content')

<!-- 🎯 Section Hero principale avec fond dégradé -->
<section class="bg-gradient-to-r from-[#537890] to-[#0565ed] text-white py-20 -mt-28 -mb-28">
    <div class="text-center max-w-7xl mx-auto px-4">

        <!-- 🟣 Titre principal -->
        <h1 class="text-5xl font-bold">Bienvenue sur <span class="text-white">PredictiveMind</span></h1>

        <!-- 📝 Sous-titre -->
        <p class="mt-4 text-xl">Planifiez, gérez vos projets Agile avec fluidité...</p>

        <!-- 🔘 Bouton d'inscription -->
        <a href="{{ route('register') }}"
           class="mt-8 inline-block bg-yellow-300 text-black px-6 py-3 rounded-full shadow hover:bg-yellow-400 transition">
            S'inscrire gratuitement
        </a>

    </div>
</section>

<!-- 📦 Importation d'AOS pour animations au scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // durée des animations
        once: true      // ne s'anime qu'une seule fois
    });
</script>

@endsection
