@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-orange">Liste des Tâches</h2>
   


    <table class="table table-bordered table-striped shadow">
        <thead class="bg-warning text-white">
            <tr class="text-center">
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Status</th>
                <th>Sprint</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="text-center align-middle">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->sprint->name ?? 'Non assignée' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune tâche trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .text-orange { color: #fb8c00; }
</style>
@endsection
