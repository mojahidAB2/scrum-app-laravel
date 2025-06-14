@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #640D5F, #D91656);
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .container-dev {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .dev-title {
        font-size: 30px;
        color: #FFB200;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        animation: fadeIn 0.8s ease-out;
    }

    .dev-backlog-table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(255,255,255,0.07);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
        animation: slideUp 1s ease-out;
    }

    .dev-backlog-table th {
        background: linear-gradient(to right, #D91656, #FB5000);
        color: white;
        padding: 14px;
        font-size: 15px;
        text-align: left;
    }

    .dev-backlog-table td {
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .dev-backlog-table tr:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transition: background 0.3s ease;
    }

    .no-data {
        text-align: center;
        color: #eee;
        background-color: rgba(0, 0, 0, 0.2);
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
    }

    .back-button {
        display: inline-block;
        background: linear-gradient(to right, #FB5000, #FFB200);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        text-decoration: none;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background: linear-gradient(to right, #D91656, #FB5000);
        transform: scale(1.05);
    }

    /* Animations */
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<div class="container-dev">
    <a href="{{ route('dashboard.dev') }}" class="back-button">Retour au Dashboard</a>

    <h2 class="dev-title">Liste des Backlogs</h2>

    @if($backlogs->count())
        <table class="dev-backlog-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Projet</th>
                    <th>User Story</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($backlogs as $backlog)
                    <tr>
                        <td>{{ $backlog->id }}</td>
                        <td>{{ optional($backlog->project)->name ?? 'Projet inconnu' }}</td>
                        <td>{{ optional($backlog->userStory)->title ?? '—' }}</td>
                        <td>{{ $backlog->titre }}</td>
                        <td>{{ $backlog->description }}</td>
                        <td>{{ $backlog->statut }}</td>
                        <td>{{ $backlog->priorite }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Aucun backlog trouvé.</div>
    @endif
</div>
@endsection
