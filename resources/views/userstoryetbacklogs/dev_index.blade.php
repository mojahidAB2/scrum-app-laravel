@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f6fa;
        font-family: 'Segoe UI', sans-serif;
        color: #2c3e50;
    }

    .container-dev {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-in-out;
    }

    .dev-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px;
        border-bottom: 1px solid #eee;
    }

    .dev-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #34495e;
    }

    .back-button {
        background-color: #3B82F6;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .back-button:hover {
        background-color: #2563eb;
    }

    table.dev-backlog-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    table th, table td {
        padding: 16px 20px;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
    }

    table th {
        background-color: #f9fafb;
        color: #555;
        font-size: 15px;
        font-weight: 600;
    }

    table td {
        font-size: 14px;
        color: #333;
    }

    table tr:hover {
        background-color: #f5f7ff;
        transition: 0.3s ease;
    }

    .no-data {
        padding: 40px;
        text-align: center;
        color: #999;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container-dev">
    <div class="dev-header">
        <h2 class="dev-title">Liste des Backlogs assignés</h2>
        <a href="{{ route('dashboard.dev') }}" class="back-button">⬅ Retour au Dashboard</a>
    </div>

    @if($backlogs->count())
        <table class="dev-backlog-table">
            <thead>
                <tr>
                    <th>Projet</th>
                    <th>User Story</th>
                    <th>Titre</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($backlogs as $backlog)
                    <tr>
                        <td>{{ optional($backlog->project)->name ?? '—' }}</td>
                        <td>{{ optional($backlog->userStory)->titre ?? '—' }}</td>
                        <td>{{ $backlog->titre }}</td>
                        <td>{{ $backlog->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Aucun backlog assigné pour l’instant.</div>
    @endif
</div>
@endsection
