<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue - Scrum App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600 flex items-center gap-2">🚀 Scrum App</h1>
            <div class="space-x-4">
                <a href="/login" class="text-sm text-gray-700 hover:text-blue-600">Connexion</a>
                <a href="/register" class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">S'inscrire</a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-grow flex flex-col items-center justify-center px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Bienvenue dans votre outil de gestion Agile</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl">
            Organisez vos projets, suivez les tâches, planifiez vos sprints et collaborez efficacement avec votre équipe.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl w-full">
            <a href="/dashboard" class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-medium py-3 px-6 rounded shadow text-center">📊 Dashboard</a>
            <a href="/projects" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-6 rounded shadow text-center">📁 Projets</a>
            <a href="/sprints" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 font-medium py-3 px-6 rounded shadow text-center">🏃‍♂️ Sprints</a>
            <a href="/user-stories" class="bg-red-100 hover:bg-red-200 text-red-800 font-medium py-3 px-6 rounded shadow text-center">📜 User Stories</a>
            <a href="/backlogs" class="bg-orange-100 hover:bg-orange-200 text-orange-800 font-medium py-3 px-6 rounded shadow text-center">📋 Backlogs</a>
            <a href="/kanban" class="bg-purple-100 hover:bg-purple-200 text-purple-800 font-medium py-3 px-6 rounded shadow text-center">📌 Kanban</a>
            <a href="/burndown-chart" class="bg-lime-100 hover:bg-lime-200 text-lime-800 font-medium py-3 px-6 rounded shadow text-center">📉 Burndown Chart</a>
            <a href="/tasks" class="bg-rose-100 hover:bg-rose-200 text-rose-800 font-medium py-3 px-6 rounded shadow text-center">✅ Tasks</a>
            <a href="/profile" class="bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-medium py-3 px-6 rounded shadow text-center">👤 Profil</a>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Scrum App. Tous droits réservés.
    </footer>
</body>
</html>
