{{-- Barre de navigation principale --}}
<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Section gauche : logo + liens --}}
            <div class="flex items-center gap-8">
                {{-- Logo avec lien vers page d'accueil --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" class="h-10">
                    <span class="text-blue-700 text-xl font-bold">PredictiveMind</span>
                </a>

                {{-- Liens de navigation pour desktop --}}
                <div class="flex space-x-6 text-sm text-gray-700">
                    <x-nav-link :href="url('/')" :active="request()->is('/')">Accueil</x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">Projets</x-nav-link>
                    <x-nav-link :href="route('sprints.index')" :active="request()->routeIs('sprints.*')">Sprints</x-nav-link>
                    <x-nav-link :href="route('user_stories.view')" :active="request()->routeIs('user_stories.*')">User Stories</x-nav-link>
                    <x-nav-link :href="route('backlogs.view')" :active="request()->routeIs('backlogs.*')">Backlogs</x-nav-link>
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">Tâches</x-nav-link>
                    <x-nav-link :href="route('tasks.kanban')" :active="request()->routeIs('kanban.*')">Kanban</x-nav-link>
                </div>
            </div>

            {{-- Section droite : menu utilisateur --}}
            <div class="flex items-center space-x-4">
                @auth
                    {{-- Utilisateur connecté --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.25 7.25L10 12l4.75-4.75L15.5 6 10 11.5 4.5 6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Déconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    {{-- Si l'utilisateur n'est pas connecté --}}
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700">S’inscrire</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
