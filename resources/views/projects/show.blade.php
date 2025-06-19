@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(to right, #F9FAFB, #E0E7FF);
    min-height: 100vh;
    color: #111827;
}

.container {
    max-width: 880px;
    margin: 3rem auto;
    padding: 2.5rem;
    background: linear-gradient(to bottom right, #f3e8ff, #e0e7ff);
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.05);
    animation: fadeIn 0.5s ease;
}

h2.title {
    font-size: 2rem;
    font-weight: bold;
    color: #3B82F6;
    margin-bottom: 2rem;
    text-align: center;
}

.label {
    font-weight: 600;
    color: #6366F1;
    margin-top: 1.2rem;
}

.value {
    color: #111827;
    font-size: 1rem;
}

.member-table {
    width: 100%;
    margin-top: 1rem;
    border-collapse: collapse;
}

.member-table th, .member-table td {
    padding: 10px 16px;
    border: 1px solid #e5e7eb;
    text-align: left;
}

.member-table th {
    background-color: #6366F1;
    color: white;
    font-weight: 600;
}

.member-table tbody tr:hover {
    background-color: #EEF2FF;
}

.actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-custom {
    background: #3B82F6;
    color: white;
    font-weight: bold;
    padding: 10px 22px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.3s ease;
}
.btn-custom:hover {
    background: #2563eb;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container">
    <h2 class="title">Détails du Projet</h2>

    <p class="label">Nom :</p>
    <p class="value">{{ $project->name }}</p>

    <p class="label">Description :</p>
    <p class="value">{{ $project->description }}</p>

    <p class="label">Date de création :</p>
    <p class="value">{{ $project->created_at->format('d/m/Y') }}</p>

    <p class="label">Type de projet :</p>
    <p class="value">
        @switch($project->project_type)
            @case('site_web') Site Web @break
            @case('application_mobile') Application Mobile @break
            @case('data_science') Data Science @break
            @case('Développement logiciel') Développement logiciel @break
            @case('Produit numérique') Produit numérique @break
            @case('Transformation digitale') Transformation digitale @break
            @case('Data/IA') Intelligence Artificielle @break
            @case('Projet interne') Projet interne @break
            @case('autre') Autre @break
            @default Non spécifié
        @endswitch
    </p>

    <p class="label">Membres :</p>
    @if($project->users->count())
        <table class="member-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="value">Aucun membre affecté.</p>
    @endif

    @if(Auth::user()->role !== 'scrum_master')
    <div class="actions">
        <a href="{{ route('projects.editMembers', $project->id) }}" class="btn-custom">Gérer les membres</a>
        <a href="{{ route('user_stories.byProject', $project->id) }}" class="btn-custom">User Stories</a>
        <a href="{{ route('backlogs.byProject', $project->id) }}" class="btn-custom">Backlogs</a>
    </div>
@endif

</div>
@endsection
