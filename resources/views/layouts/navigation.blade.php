{{-- Barre de navigation principale --}}
<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Section gauche : logo + liens --}}
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" class="h-10">
                    <span class="text-blue-700 text-xl font-bold">PredictiveMind</span>
                </a>

                <div class="flex space-x-6 text-sm text-gray-700">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Accueil</a>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Dashboard</a>
                    <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Projets</a>
                    <a href="{{ route('sprints.index') }}" class="{{ request()->routeIs('sprints.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Sprints</a>
                    <a href="{{ route('user_stories.view') }}" class="{{ request()->routeIs('user_stories.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">User Stories</a>
                    <a href="{{ route('backlogs.view') }}" class="{{ request()->routeIs('backlogs.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Backlogs</a>
                    <a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Tâches</a>
                    <a href="{{ route('tasks.kanban') }}" class="{{ request()->routeIs('kanban.*') ? 'text-blue-600 font-bold' : 'hover:text-blue-500' }}">Kanban</a>
                </div>
            </div>

            {{-- Section droite : menu utilisateur --}}
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700">S’inscrire</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
