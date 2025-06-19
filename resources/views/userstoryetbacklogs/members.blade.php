@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 2rem;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th, td {
        padding: 1rem;
        border: 1px solid #e5e7eb;
        text-align: center;
    }

    th {
        background-color: #3B82F6;
        color: white;
        font-size: 1rem;
    }

    td {
        font-size: 1rem;
    }

    h2 {
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        color: #3B82F6;
    }

    .btn-assign {
        background-color: #3B82F6;
        color: white;
        padding: 0.6rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: bold;
        transition: background 0.3s ease-in-out;
        text-decoration: none;
        display: inline-block;
    }

    .btn-assign:hover {
        background-color: #2563EB;
    }

    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin-bottom: 1rem;
        }

        td {
            padding-left: 50%;
            position: relative;
            text-align: left;
        }

        td::before {
            position: absolute;
            top: 1rem;
            left: 1rem;
            width: 45%;
            white-space: nowrap;
            font-weight: bold;
        }

        td:nth-of-type(1)::before { content: "Nom"; }
        td:nth-of-type(2)::before { content: "Email"; }
        td:nth-of-type(3)::before { content: "Action"; }
    }
</style>

<div class="container">
    <h2>Liste des développeurs</h2>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $dev)
                <tr>
                    <td>{{ $dev->name }}</td>
                    <td>{{ $dev->email }}</td>
                    <td>
                        <a href="{{ route('assign.backlogs.form', $dev->id) }}" class="btn-assign">
                            Assigner des tâches
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
