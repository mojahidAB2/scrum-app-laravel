@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Titre --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                Profil
            </h2>
        </div>

        {{-- Formulaire d'information du profil --}}
        <div class="p-6 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Formulaire de changement de mot de passe --}}
        <div class="p-6 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Formulaire de suppression de compte --}}
        <div class="p-6 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
