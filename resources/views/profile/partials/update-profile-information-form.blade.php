<section class="max-w-xl bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold text-gray-800 mb-2">Informations du profil</h2>
    <p class="text-sm text-gray-600 mb-6">
        Mettez à jour votre nom et votre adresse e-mail.
    </p>

    @if (session('status') === 'profile-updated')
        <div class="mb-4 text-sm text-green-600 font-medium">
            Modifications enregistrées avec succès.
        </div>
    @endif

    {{-- Bouton pour renvoyer l'e-mail de vérification --}}
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        {{-- Nom --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-600">
                        Votre adresse e-mail n’est pas vérifiée.

                        <button form="send-verification" class="underline text-sm text-indigo-600 hover:text-indigo-900">
                            Cliquez ici pour renvoyer l’e-mail de vérification.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-sm text-green-600 mt-1">Un nouveau lien de vérification a été envoyé.</p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Bouton Enregistrer --}}
        <div>
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                Enregistrer
            </button>
        </div>
    </form>
</section>
