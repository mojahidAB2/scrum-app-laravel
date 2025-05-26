<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PredictiveMind - Invité</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#c3c0c4] to-[#6260e0] min-h-screen pt-32 px-4">

    {{-- ✅ NavBar --}}
    @include('layouts.navigation')

    {{-- ✅ Contenu invité --}}
   <div class="bg-gray-900 text-white rounded-xl shadow-lg w-full max-w-md p-8">
        @yield('guest-content')
    </div>

</body>
</html>
