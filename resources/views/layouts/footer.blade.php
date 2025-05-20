<footer class="bg-[#ba3dd1] text-white mt-10 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Logo et nom --}}
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" class="h-10 rounded">
            <span class="text-xl font-bold">PredictiveMind</span>
        </div>

        {{-- Liens rapides --}}
        <div>
            <h4 class="text-lg font-semibold mb-3">Liens utiles</h4>
            <ul class="space-y-1 text-sm">
                <li><a href="{{ url('/') }}" class="hover:underline">Accueil</a></li>
                <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('projects.index') }}" class="hover:underline">Projets</a></li>
                <li><a href="{{ route('tasks.index') }}" class="hover:underline">Tâches</a></li>
            </ul>
        </div>

        {{-- Contact ou mention --}}
        <div>
            <h4 class="text-lg font-semibold mb-3">Contact</h4>
            <p class="text-sm">Email : contact@predictivemind.com</p>
            <p class="text-sm">Tél : +212 6 00 00 00 00</p>
        </div>

    </div>

    <div class="bg-[#f18ac5] text-center text-sm py-3">
        © {{ date('Y') }} PredictiveMind. Tous droits réservés.
    </div>
</footer>
