
<nav style="background-color: #4A249D; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.2); padding: 12px 0; position: fixed; top: 0; left: 0; width: 100%; z-index: 50;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: flex; justify-content: space-between; align-items: center;">

        {{-- Logo + Accueil --}}
        <div style="display: flex; align-items: center; gap: 32px;">
            <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <img src="{{ asset('logo.jpg') }}" alt="logo" style="height: 40px; width: auto;">
                <span style="color: #FFD700; font-size: 24px; font-weight: bold; text-shadow: 1px 1px 2px black;">
                    PredictiveMind
                </span>
            </a>

            <div style="display: flex; gap: 20px; font-size: 14px; font-weight: 500;">
                <a href="{{ url('/') }}" style="{{ request()->is('/') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Accueil</a>

                @auth
                    <a href="{{ route('dashboard') }}" style="{{ request()->routeIs('dashboard') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Dashboard</a>
                    <a href="{{ route('projects.index') }}" style="{{ request()->routeIs('projects.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Projets</a>
                    <a href="{{ route('sprints.index') }}" style="{{ request()->routeIs('sprints.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Sprints</a>
                    <a href="{{ route('user_stories.view') }}" style="{{ request()->routeIs('user_stories.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">User Stories</a>
                    <a href="{{ route('backlogs.view') }}" style="{{ request()->routeIs('backlogs.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Backlogs</a>
                    <a href="{{ route('tasks.index') }}" style="{{ request()->routeIs('tasks.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Tâches</a>
                    <a href="{{ route('tasks.kanban') }}" style="{{ request()->routeIs('kanban.*') ? 'color: #FFD700; font-weight: bold;' : 'color: white;' }} text-decoration: none;">Kanban</a>

<nav class="navbar navbar-expand-md bg-blue-main text-white fixed-top shadow-sm">
    <div class="container-fluid px-4">

        {{-- 🔵 Logo + Titre --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="me-2 rounded shadow" style="height: 40px;">
            <strong>PredictiveMind</strong>
        </a>

        {{-- 🔘 Bouton toggle pour mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- 📄 Liens de navigation --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-bold text-gold' : 'text-white' }}"
                       href="{{ url('/') }}">Accueil</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('projects.index') }}">Projets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('sprints.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('sprints.index') }}">Sprints</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user_stories.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('user_stories.view') }}">User Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('backlogs.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('backlogs.view') }}">Backlogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('tasks.index') }}">Tâches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kanban.*') ? 'active fw-bold text-gold' : 'text-white' }}"
                           href="{{ route('tasks.kanban') }}">Kanban</a>
                    </li>
                @endauth
            </ul>

        {{-- Zone utilisateur --}}
        <div style="display: flex; align-items: center; gap: 16px;">
            @auth
                <span style="font-size: 14px; font-weight: 600;">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button style="background: none; border: none; color: #ffdddd; cursor: pointer; font-size: 14px; text-decoration: underline;">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="background-color: #eee; color: #4A249D; padding: 8px 16px; border-radius: 6px; text-decoration: none;">Connexion</a>
                <a href="{{ route('register') }}" style="background-color: #FFD700; color: black; padding: 8px 16px; border-radius: 6px; text-decoration: none;">S’inscrire</a>
            @endauth

            {{-- 👤 Zone utilisateur à droite --}}
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item d-flex align-items-center me-3">
                        <span class="text-white small">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-light">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn bg-gold btn-sm text-dark">S’inscrire</a>
                    </li>
                @endauth
            </ul>

        </div>

    </div>
</nav>
