@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, var(--bg-light), #e0e7ff);
        min-height: 100vh;
        color: var(--text-dark);
    }

    .form-container {
        max-width: 700px;
        margin: 3rem auto;
        background: linear-gradient(to bottom right, #f9f5ff, #e0e7ff);
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.5s ease;
    }

    .form-container h2 {
        text-align: center;
        font-weight: bold;
        color: var(--blue-main);
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--indigo);
    }

    .select2-container--default .select2-selection--multiple {
    background: white;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    min-height: 50px;
    padding: 6px 12px;
    font-size: 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06); /* Ajout ici */
    transition: box-shadow 0.3s ease;
}
.select2-container--default .select2-selection--multiple:hover {
    box-shadow: 0 4px 14px rgba(99, 102, 241, 0.15); /* Indigo */
}


.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background: #7400f9 !important;  /* Neon rose */
    color: white !important;
    border: none;
    border-radius: 50px;
    padding: 4px 12px;
    font-weight: 500;
    margin-top: 4px;
    box-shadow: 0 3px 6px rgb(245, 5, 209); /* effet glow */
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: white !important;
    font-weight: bold;
    margin-right: 6px;
}


    .select2-dropdown {
        border-radius: 10px;
        background: linear-gradient(to bottom, #fff, #f3f4ff);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background: var(--blue-main);
        color: white;
    }

    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #dbeafe;
        color: black;
    }

    .btn-submit {
        background: var(--blue-main);
        color: white;
        font-weight: bold;
        padding: 0.6rem 2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
        width: 100%;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background: #2563eb;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="form-container">
    <h2>Ajouter des membres au projet : <br><span style="color:#391e99">{{ $project->name }}</span></h2>

    <form action="{{ route('projects.updateMembers', $project->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="users" class="form-label">Sélectionnez les membres :</label>
            <select name="users[]" multiple class="form-control select2" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $project->users->contains($user->id) ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-submit">Enregistrer</button>
    </form>
</div>

<!-- Select2 CDN -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Sélectionnez des membres",
            width: '100%'
        });
    });
</script>
@endsection
