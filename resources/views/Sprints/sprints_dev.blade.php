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
</style>

<div class="sprint-container">
    <a href="{{ route('dashboard.dev') }}" class="btn-retour">⬅ Retour au Dashboard</a>

    <h2 class="title">Liste des Sprints</h2>

    @if($sprints->count())
        <table class="sprint-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sprints as $sprint)
                    <tr>
                        <td>{{ $sprint->id }}</td>
                        <td>{{ $sprint->titre }}</td>
                        <td>{{ $sprint->description }}</td>
                        <td>{{ $sprint->date_debut }}</td>
                        <td>{{ $sprint->date_fin }}</td>
                        <td>{{ $sprint->statut }}</td>
                        <td>{{ $sprint->priorite }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">Aucun sprint trouvé.</div>
    @endif
</div>
@endsection
