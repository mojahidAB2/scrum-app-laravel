@extends('layouts.app')

@section('content')
<style>
    .container-backlogs {
        max-width: 900px;
        margin: 2rem auto;
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #3B82F6;
        font-weight: bold;
        margin-bottom: 2rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    th, td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    th {
        background-color: #3B82F6;
        color: white;
    }

    tr:hover {
        background-color: #f3f4f6;
    }

    .empty-message {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-style: italic;
    }
    .btn-retour {
    display: inline-block;
    margin-bottom: 20px;
    padding: 10px 20px;
    background-color: #3B82F6;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: background 0.3s ease;
}
.btn-retour:hover {
    background-color: #2563EB;
}
</style>
 <a href="{{ route('dashboard.dev') }}" class="btn-retour"> Retour au Dashboard</a>


<div class="container-backlogs">
    <h2> Backlogs assignés</h2>

    @if ($backlogs->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Nom du Backlog</th>
                <th>Projet</th>
                <th>Sprint</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($backlogs as $backlog)
                <tr>
                    <td>{{ $backlog->titre }}</td>
                    <td>{{ $backlog->project->name ?? 'N/A' }}</td>
                    <td>{{ $backlog->sprint->name ?? 'Non assigné' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="empty-message">
            Aucun backlog assigné pour le moment.
        </div>
    @endif
</div>

@endsection
