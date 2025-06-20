@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #fce3f4, #e5d4f7);
    }

    .sprint-container {
        max-width: 1000px;
        margin: 40px auto;
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .title {
        text-align: center;
        color: #a12bbd;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .btn-retour {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 18px;
        background: linear-gradient(to right, #7e1891, #ba3dd1);
        color: white;
        font-weight: bold;
        border-radius: 30px;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .btn-retour:hover {
        background: linear-gradient(to right, #5e1271, #a02ac3);
        transform: translateY(-2px);
    }

    .sprint-table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 12px;
    }

    .sprint-table th {
        background: linear-gradient(to right, #ba3dd1, #f18ac5);
        color: white;
        padding: 14px;
        text-align: left;
        font-size: 15px;
    }

    .sprint-table td {
        padding: 12px;
        border-bottom: 1px solid #f0f0f0;
        color: #333;
        background-color: #fff;
    }

    .sprint-table tr:hover {
        background-color: #fdf0fa;
    }

    .no-data {
        text-align: center;
        color: #777;
        margin-top: 20px;
        font-size: 16px;
    }

    .status-select {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        color: white;
        font-size: 13px;
        cursor: pointer;
    }

    .status-en-cours {
        background: #4299e1;
    }

    .status-termine {
        background: #48bb78;
    }

    .status-bloque {
        background: #f56565;
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
                    <th>Statut</th>
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
                        <td>
                            <form action="{{ route('sprints.updateStatus', $sprint->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="{{ $statusClass }}" onchange="this.form.submit()">
                                    <option value="en cours" {{ $sprint->status == 'en cours' ? 'selected' : '' }}>en cours</option>
                                    <option value="terminé" {{ $sprint->status == 'terminé' ? 'selected' : '' }}>terminé</option>
                                    <option value="bloqué" {{ $sprint->status == 'bloqué' ? 'selected' : '' }}>bloqué</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Aucun sprint trouvé.</div>
    @endif
</div>
@endsection
