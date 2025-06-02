@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1e1e2f;
        color: #e22626;
    }

    .table-dark th, .table-dark td {
        color: #fff;
        vertical-align: middle;
    }

    .custom-card {
        background-color: #2b2c3d;
        color: #fff;
        border: 1px solid #3c3d50;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .btn-dark-blue {
        background-color: #3c4bd7;
        color: white;
    }

    .btn-dark-blue:hover {
        background-color: #2f3ab3;
    }
</style>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Bienvenue Product Owner</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-dark-blue">
            Nouveau projet
        </a>
    </div>

    <!-- Section statistiques -->
    <div class="custom-card">
        <h4 class="mb-3">Statistiques générales</h4>
        <table class="table table-dark table-hover text-center">
            <thead>
                <tr>
                    <th>Projets</th>
                    <th>User Stories</th>
                    <th>Backlogs </th>
                    <th>sprints</th>
                </tr>
            </thead>
        </table>
    </div>



    <!-- Actions -->
    <div class="mt-4 text-end">
        <a href="{{ route('projects.create') }}" class="btn btn-outline-light me-2">
            Créer un projet
        </a>
        <a href="{{ route('user_stories.create') }}" class="btn btn-outline-warning">
            Ajouter une User Story
        </a>
    </div>

</div>
@endsection
