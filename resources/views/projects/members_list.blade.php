@extends('layouts.app')

@section('content')
<style>
.container {
    max-width: 768px;
    margin: 3rem auto;
    background-color: #1f2937; /* gray-900 */
    color: white;
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #facc15; /* yellow-400 */
    margin-bottom: 1.5rem;
}

.alert {
    background-color: #fef3c7; /* yellow-100 */
    color: #92400e; /* yellow-800 */
    font-size: 0.875rem;
    padding: 1rem;
    border-radius: 0.375rem;
}

.member-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.member-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #374151; /* gray-700 */
    padding: 1rem;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease;
    font-weight: 500;
}

.member-list li:hover {
    background-color: #4b5563; /* gray-600 */
}

.member-email {
    font-size: 0.875rem;
    color: #d1d5db; /* gray-300 */
}

.back-btn {
    margin-top: 2rem;
    display: inline-block;
    background-color: #2563eb; /* blue-600 */
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 0.375rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.back-btn:hover {
    background-color: #1d4ed8; /* blue-700 */
}
</style>

<div class="container">

    {{-- 🟪 Titre --}}
    <h2 class="title">Membres du projet : {{ $projet->name }}</h2>

    {{-- 📋 Liste des membres --}}
    @if ($projet->users->isEmpty())
        <div class="alert">
            Aucun membre affecté à ce projet.
        </div>
    @else
        <ul class="member-list">
            @foreach ($projet->users as $user)
                <li>
                    <span>{{ $user->name }}</span>
                    <span class="member-email">{{ $user->email }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    {{-- 🔙 Bouton retour --}}
    <a href="{{ route('projects.show', $projet->id) }}" class="back-btn">
        ← Retour au projet
    </a>

</div>
@endsection
