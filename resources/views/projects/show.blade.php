@extends('layouts.app')

@section('content')
    <style>
        .title-color {
            color: #391e99;
        }

        .card {
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .btn-back {
            background-color: #f18ac5;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #e067a8;
        }

        .label {
            font-weight: 600;
            color: #6b7280;
        }

        .value {
            color: #111827;
            margin-bottom: 16px;
        }
    </style>

    <div class="max-w-3xl mx-auto my-12">
        <div class="card">
            <h2 class="text-3xl font-bold mb-6 title-color">Détails du Projet</h2>

            <div>
                <p><span class="label">Nom :</span></p>
                <p class="value">{{ $project->name }}</p>

                <p><span class="label">Description :</span></p>
                <p class="value">{{ $project->description }}</p>

                <p><span class="label">Date de création :</span></p>
                <p class="value">{{ $project->created_at->format('d/m/Y') }}</p>

                <p><span class="label">Membres :</span></p>
                <ul class="list-disc ml-6">
                    @forelse ($project->members as $member)
                        <li>{{ $member->name }}</li>
                    @empty
                        <li>Aucun membre affecté.</li>
                    @endforelse
                </ul>
            </div>

            <div class="mt-6">
                <a href="{{ route('projects.index') }}" class="btn-back">← Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection
