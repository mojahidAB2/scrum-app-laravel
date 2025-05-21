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
<body class="bg-gradient-to-br from-[#ba3dd1] to-[#f18ac5] min-h-screen flex items-center justify-center py-10 px-4">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        @yield('guest-content')
    </div>

</body>
</html>
