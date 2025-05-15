@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111827;
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }
    .dashboard-container {
        background-color: #1f2937;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-top: 40px;
    }
    .dashboard-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #fff;
    }
    .table-dark-custom {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .table-dark-custom thead {
        background-color: #374151;
    }
    .table-dark-custom th, .table-dark-custom td {
        padding: 14px 20px;
        text-align: center;
        border-bottom: 1px solid #4b5563;
    }
    .table-dark-custom tr:hover {
        background-color: #2d3748;
    }
    .btn-back {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        margin-top: 25px;
        display: inline-block;
        transition: background-color 0.3s;
        text-decoration: none;
    }
    .btn-back:hover {
        background-color: #2563eb;
    }
</style>

<div class="container dashboard-container">
    <div class="dashboard-title"> Sprints du Projet {{ $projectId }}</div>

    @if ($sprints->isEmpty())
        <div class="alert alert-warning text-dark">Aucun sprint disponible.</div>
    @else
        <table class="table-dark-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sprints as $sprint)
                <tr>
                    <td>{{ $sprint->id }}</td>
                    <td>{{ $sprint->name }}</td>
                    <td>{{ $sprint->start_date }}</td>
                    <td>{{ $sprint->end_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-start">
        <a href="{{ route('projects.show', $projectId) }}" class="btn-back mt-4"> Retour au projet</a>
    </div>
</div>
@endsection
