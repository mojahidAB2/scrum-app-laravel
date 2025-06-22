@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #3f6bf0,);
    }

    .sprint-container {
        max-width: 1000px;
        margin: 40px auto;
        background: rgb(222, 222, 227);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .title {
        text-align: center;
        color: #000000;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .btn-retour {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 18px;
        background: linear-gradient(to right, #3a37d7, #2407e6);
        color: white;
        font-weight: bold;
        border-radius: 30px;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .btn-retour:hover {
        background: linear-gradient(to right,  #5313e7);
        transform: translateY(-2px);
    }

    .sprint-table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 12px;
    }

    .sprint-table th {
        background: linear-gradient(to right, #2167f3);
        color: white;
        padding: 14px;
        text-align: left;
        font-size: 15px;
    }

    .sprint-table td {
        padding: 12px;
        border-bottom: 1px solid #f0f0f0;
        color: #333;
        background-color: #729ded;
    }

    .sprint-table tr:hover {
        background-color: #f285d9;
    }

    .no-data {
        text-align: center;
        color: #777;
        margin-top: 20px;
        font-size: 16px;
    }




</style>

<div class="sprint-container">
    <a href="{{ route('dashboard.dev') }}" class="btn-retour">⬅ Retour</a>

    <h2 class="title">Liste des Sprints</h2>

    @if($sprints->count())
        <table class="sprint-table">
            <thead>
                <tr>
                    <th>Projet</th>
                    <th>Titre</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sprints as $sprint)
                    @php
                        $statusClass = match($sprint->status) {
                            'en cours' => 'status-select status-en-cours',
                            'terminé' => 'status-select status-termine',
                            'bloqué' => 'status-select status-bloque',
                            default => 'status-select'
                        };
                    @endphp
                    <tr>
                        <td>{{ $sprint->project->name ?? '—' }}</td>
                        <td>{{ $sprint->name }}</td>
                        <td>{{ $sprint->start_date }}</td>
                        <td>{{ $sprint->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Aucun sprint trouvé.</div>
    @endif
</div>
@endsection
