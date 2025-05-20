<x-guest-layout>
    <div class="bg-gradient-to-br from-[#ba3dd1] to-[#f18ac5] min-h-screen flex items-center justify-center py-10 px-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
            <h2 class="text-2xl font-bold text-center text-[#ba3dd1] mb-6">Connexion à PredictiveMind</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold py-2 px-4 rounded">
                    Connexion
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-sm text-[#f18ac5] hover:underline">
                    Pas encore de compte ? S’inscrire
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
