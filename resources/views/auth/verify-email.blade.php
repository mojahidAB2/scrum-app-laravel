@extends('layouts.guest')

@section('guest-content')

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer. Si vous n\'avez pas reçu l\'e-mail, nous vous en renverrons un autre avec plaisir.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit"
                class="bg-[#ba3dd1] hover:bg-[#a72abc] text-white px-4 py-2 rounded text-sm font-semibold">
                {{ __('Renvoyer l’e-mail de vérification') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ba3dd1]">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>

@endsection
