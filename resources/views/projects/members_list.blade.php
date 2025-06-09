@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title">Membres du projet : {{ $project->name }}</h2>

    @if ($project->users->isEmpty())
        <div class="alert alert-warning">
            Aucun membre affecté à ce projet.
        </div>
    @else
        <ul class="member-list">
            @foreach ($project->users as $user)
                <li>
                    <strong>{{ $user->name }}</strong> - <span class="text-muted">{{ $user->email }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-secondary mt-3">
        ← Retour au projet
    </a>
</div>
@endsection
