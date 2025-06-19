<nav style="position: fixed; top: 0; left: 0; width: 100%; z-index: 50; background-color: #3B82F6; color: white; padding: 0;">
    <div style="max-width: 100%; margin: 0; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center;">

        {{-- 🔵 Logo + Accueil --}}
        <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
            <img src="{{ asset('logo.jpg') }}" alt="logo" style="height: 40px; width: auto; border-radius: 6px;">
            <span style="color: #FACC15; font-size: 22px; font-weight: bold; text-shadow: 1px 1px 2px #000;">
                PredictiveMind
            </span>
        </a>

        {{-- 📄 Liens --}}
        <div style="display: flex; gap: 20px; font-size: 14px; font-weight: 500;">
            <a href="{{ url('/') }}" style="text-decoration: none; color: white;">Accueil</a>
            @auth
                <a href="{{ route('dashboard') }}" style="text-decoration: none; color: white;">Dashboard</a>
                <a href="{{ route('projects.index') }}" style="text-decoration: none; color: white;">Projets</a>
                <a href="{{ route('sprints.index') }}" style="text-decoration: none; color: white;">Sprints</a>
                <a href="{{ route('user_stories.view') }}" style="text-decoration: none; color: white;">User Stories</a>
                <a href="{{ route('backlogs.view') }}" style="text-decoration: none; color: white;">Backlogs</a>
            @endauth
        </div>

        {{-- 👤 Utilisateur --}}
        <div style="display: flex; align-items: center; gap: 16px;">
          @auth
    <span style="font-size: 14px; font-weight: 600;">{{ Auth::user()->name }}</span>

    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
        @csrf
        <button type="submit"
                style="background-color: white; color: #3B82F6; font-weight: bold; padding: 6px 12px; border-radius: 6px; border: none; cursor: pointer;">
            Déconnexion
        </button>
    </form>
@endauth


            @guest
                <a href="{{ route('login') }}" style="background-color: white; color: #3B82F6; font-weight: bold; padding: 8px 16px; border-radius: 6px; text-decoration: none;">
                    Connexion
                </a>
                <a href="{{ route('register') }}" style="background-color: #FACC15; color: black; font-weight: bold; padding: 8px 16px; border-radius: 6px; text-decoration: none;">
                    S’inscrire
                </a>
            @endguest
        </div>
    </div>
</nav>
