<nav class="bg-[#4A249D] text-white shadow-md py-3 z-50 fixed top-0 left-0 w-full">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

        {{-- Logo + Accueil --}}
        <div class="flex items-center gap-8">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('logo.jpg') }}" alt="logo" class="h-10 w-auto">
     

                <span class="text-bleu text-2xl font-extrabold drop-shadow-lg">
                    PredictiveMind
                </span>
            </a>

            <div class="hidden md:flex space-x-6 text-sm font-medium">
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">
                    Accueil
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Dashboard</a>
                    <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Projets</a>
                    <a href="{{ route('sprints.index') }}" class="{{ request()->routeIs('sprints.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Sprints</a>
                    <a href="{{ route('user_stories.view') }}" class="{{ request()->routeIs('user_stories.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">User Stories</a>
                    <a href="{{ route('backlogs.view') }}" class="{{ request()->routeIs('backlogs.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Backlogs</a>
                    <a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Tâches</a>
                    <a href="{{ route('tasks.kanban') }}" class="{{ request()->routeIs('kanban.*') ? 'text-yellow-300 font-bold' : 'hover:text-yellow-300' }} hover:underline transition">Kanban</a>
                @endauth
            </div>
        </div>

        {{-- Zone utilisateur --}}
        <div class="flex items-center gap-4">
            @auth
                <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-100 hover:underline transition">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-wavy text-[#4A249D] px-4 py-2 rounded hover:bg-gray-200 transition">Connexion</a>
                <a href="{{ route('register') }}" class="bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">S’inscrire</a>
            @endauth
        </div>

    </div>
</nav>
