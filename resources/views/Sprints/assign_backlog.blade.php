@extends('layouts.app')

@section('content')
<!-- ✅ CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- ✅ JS jQuery + Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    :root {
        --primary: #3B82F6;
        --secondary: #6366F1;
        --bg-light: #F9FAFB;
        --text-dark: #111827;
    }

    body {
        background: linear-gradient(to right, #F9FAFB, #FFFFFF);
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    .form-container {
        max-width: 700px;
        margin: 4rem auto;
        background: #fff;
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        color: var(--text-dark);
    }

    h2 {
        text-align: center;
        color: var(--primary);
        font-size: 1.6rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: block;
        color: var(--text-dark);
    }

    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        padding: 6px;
        min-height: 48px;
        font-size: 15px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: var(--secondary);
        border: none;
        color: white;
        padding: 4px 10px;
        margin-top: 4px;
        font-weight: 600;
        border-radius: 6px;
    }

    .btn-submit {
        background-color: var(--primary);
        color: white;
        font-weight: bold;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        width: 100%;
        transition: background 0.3s ease-in-out;
    }

    .btn-submit:hover {
        background-color: var(--secondary);
    }

    table {
        width: 100%;
        margin-top: 2rem;
        border-collapse: collapse;
        background: #fff;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    th, td {
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    th {
        background-color: var(--primary);
        color: white;
    }

    .btn-remove {
        background-color: #ef4444;
        color: white;
        padding: 6px 14px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-remove:hover {
        background-color: #dc2626;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        text-align: center;
    }
</style>

<div class="form-container">
    <h2>Assigner des Backlogs au Sprint</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORMULAIRE D’ASSIGNATION --}}
    <form method="POST" action="{{ route('sprints.assign.backlog', $sprint->id) }}">
        @csrf
        <label for="backlog_ids">Sélectionnez un ou plusieurs Backlogs :</label>
        <select name="backlog_ids[]" id="backlog_ids" multiple required>
            @foreach($backlogs as $backlog)
                <option value="{{ $backlog->id }}">{{ $backlog->titre }} </option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit">Assigner</button>
    </form>

    {{-- TABLEAU DES BACKLOGS DÉJÀ ASSIGNÉS --}}
    @if($assignedBacklogs->count() > 0)
        <h3 style="margin-top: 2.5rem; margin-bottom: 1rem; color: var(--text-dark); font-weight: bold;">Backlogs déjà assignés</h3>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignedBacklogs as $b)
                <tr>
                    <td>{{ $b->titre }}</td>
                    <td>{{ $b->description }}</td>
                    <td>
                        <form method="POST" action="{{ route('backlogs.remove', $b->id) }}">
                            @csrf
                            <button type="submit"
                                class="btn-remove"
                                onclick="return confirm('Êtes-vous sûr de vouloir retirer ce backlog ?');">
                                ❌ Retirer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- ✅ Initialisation de Select2 -->
<script>
    $(document).ready(function () {
        $('#backlog_ids').select2({
            placeholder: "Sélectionnez les backlogs",
            allowClear: true
        });
    });
</script>
@endsection
