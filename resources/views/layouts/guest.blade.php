<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PredictiveMind - Invité</title>

    <style>
        body {
            background: linear-gradient(to bottom right, #c3c0c4, #6260e0);
            min-height: 100vh;
            padding-top: 120px;
            padding-left: 16px;
            padding-right: 16px;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .guest-container {
            background-color: #1a202c;
            color: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 32px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    {{-- ✅ NavBar --}}
    @include('layouts.navigation')

    {{-- ✅ Contenu invité --}}
    <div class="guest-container">
        @yield('guest-content')
    </div>

</body>
</html>
