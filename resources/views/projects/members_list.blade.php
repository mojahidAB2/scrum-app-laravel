@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .member-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        margin-top: 50px;
    }

    .member-title {
        font-size: 26px;
        font-weight: bold;
        color: #fbbf24;
        margin-bottom: 25px;
    }

    .member-list {
        list-style: none;
        padding-left: 0;
    }

    .member-item {
        background-color: #374151;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s;
    }

    .member-item:hover {
        background-color: #4b5563;
    }

    .member-name {
        font-weight: 500;
        font-size: 16px;
    }

    .member-email {
        color: #9ca3af;
        font-size: 14px;
    }

    .btn-back {
        margin-top: 30px;
        background-color: #3b82f6;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        color: white;
        transition: background-color 0.3s;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #2563eb;
    }
</style>

<div class="container member-container">
    <h2 class="member-title"> Membres du projet : {{ $projet->name }}</h2>

    @if ($projet->users->isEmpty())
        <div class="alert alert-warning bg-light text-dark">Aucun membre affecté à ce projet.</div>
    @else
        <ul class="member-list">
            @foreach ($projet->users as $user)
                <li class="member-item">
                    <span class="member-name">{{ $user->name }}</span>
                    <span class="member-email">{{ $user->email }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('projects.show', $projet->id) }}" class="btn-back"> Retour au projet</a>
</div>
@endsection
