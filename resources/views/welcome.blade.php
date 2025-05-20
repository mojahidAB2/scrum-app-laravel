@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-[#ba3dd1] to-[#f18ac5] text-white py-20">
    <div class="text-center max-w-7xl mx-auto">
        <h1 class="text-5xl font-bold">Bienvenue sur <span class="text-white">PredictiveMind</span></h1>
        <p class="mt-4 text-xl">Planifiez, gérez vos projets Agile avec fluidité...</p>
        <a href="/register" class="mt-8 inline-block bg-white text-[#ba3dd1] px-6 py-3 rounded-full shadow">S'inscrire gratuitement</a>
    </div>
</section>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
</script>

@endsection
