@extends('layouts.app')

@section('content')
<style>
:root {
    --blue-main: #3B82F6;
    --indigo: #6366F1;
    --bg-light: #F9FAFB;
    --text-dark: #111827;
}

body {
    background-color: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
}

.page-container {
    max-width: 1100px;
    margin: 4rem auto;
    padding: 2rem;
    background-color: white;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    animation: fadeIn 0.5s ease;
}

.page-title {
    font-size: 2rem;
    font-weight: bold;
    color: var(--indigo);
    margin-bottom: 2rem;
    text-align: center;
}

/* Tableau */
.table-wrapper {
    overflow-x: auto;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffff;
    color: var(--text-dark);
    border-radius: 8px;
    overflow: hidden;
    font-size: 0.95rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.table-custom thead {
    background-color: var(--blue-main);
    color: white;
    text-transform: uppercase;
    font-weight: 600;
}

.table-custom th, .table-custom td {
    padding: 1rem;
    text-align: center;
    border-bottom: 1px solid #e5e7eb;
}

.table-custom tbody tr:hover {
    background-color: #f1f5f9;
}

/* No sprint msg */
.empty-message {
    text-align: center;
    font-size: 1.1rem;
    font-style: italic;
    color: #6b7280;
    margin-top: 2rem;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="page-container">
    <h2 class="page-title"> Liste des Sprints</h2>

    @if($sprints->count())
    <div class="table-wrapper">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Projet</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sprints as $sprint)
                    <tr>
                        <td>{{ $sprint->name }}</td>
                        <td>{{ optional($sprint->project)->name }}</td>
                        <td>{{ $sprint->start_date }}</td>
                        <td>{{ $sprint->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="empty-message">Aucun sprint trouvé pour le moment.</div>
    @endif
</div>
@endsection
