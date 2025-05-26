<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Projets --}}
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl p-4 shadow-md">
            <div class="text-sm uppercase">📁 Projets</div>
            <div class="text-3xl font-bold mt-2">{{ \App\Models\Project::count() }}</div>
        </div>

        {{-- Tâches --}}
        <div class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl p-4 shadow-md">
            <div class="text-sm uppercase">📝 Tâches</div>
            <div class="text-3xl font-bold mt-2">{{ \App\Models\Task::count() }}</div>
        </div>

        {{-- Utilisateurs --}}
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-xl p-4 shadow-md">
            <div class="text-sm uppercase">👤 Utilisateurs</div>
            <div class="text-3xl font-bold mt-2">{{ \App\Models\User::count() }}</div>
        </div>

        {{-- User Stories --}}
        <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white rounded-xl p-4 shadow-md">
            <div class="text-sm uppercase">📚 User Stories</div>
            <div class="text-3xl font-bold mt-2">{{ \App\Models\UserStory::count() }}</div>
        </div>
    </div>

    {{-- Bloc supplémentaire --}}
    <div class="mt-10">
        <h2 class="text-xl font-bold mb-4">📊 Autres statistiques bientôt disponibles</h2>
        <p class="text-gray-500">Vous pouvez ajouter ici des graphiques, tableaux ou notifications.</p>
    </div>
</x-filament::page>
