@extends('layouts.app')

@section('content')
<!-- ✅ CDN Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .container-assign {
        max-width: 800px;
        margin: 3rem auto;
        background: #fff;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: #3B82F6;
        margin-bottom: 1.5rem;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #3B82F6;
        border-radius: 8px;
        padding: 6px;
        min-height: 44px;
    }

    .select2-selection__choice {
        background-color: #6366F1;
        color: #fff;
        font-weight: 600;
        border-radius: 6px;
        padding: 3px 8px;
    }

    .btn {
        background-color: #3B82F6;
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .btn:hover {
        background-color: #6366F1;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 0.5rem;
        text-align: center;
    }

    table {
        width: 100%;
        margin-top: 2rem;
        border-collapse: collapse;
        background: #f9fafb;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    th, td {
        padding: 0.75rem 1rem;
        text-align: left;
    }

    th {
        background-color: #3B82F6;
        color: white;
    }

    .btn-remove {
        background-color: #ef4444;
        color: white;
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-remove:hover {
        background-color: #dc2626;
    }
</style>

<div class="container-assign">
    <h2>Assigner des Backlogs à {{ $developer->name }}</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('assign.backlogs.to.dev', $developer->id) }}">
        @csrf
        <label for="backlogs">Sélectionnez les backlogs :</label>
        <select name="backlogs[]" id="backlogs" class="select2" multiple required>
            @foreach($backlogs as $backlog)
                <option value="{{ $backlog->id }}">
                    {{ $backlog->titre }} (Sprint: {{ $backlog->sprint->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn">Assigner</button>
    </form>

    {{-- 🧾 Tableau des backlogs déjà assignés --}}
    @if($developer->backlogs->count() > 0)
        <h3 style="margin-top: 2rem; color:#111827; font-weight: bold;">Backlogs déjà assignés</h3>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Sprint</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($developer->backlogs as $b)
                    <tr>
                        <td>{{ $b->titre }}</td>
                        <td>{{ $b->sprint->name ?? 'N/A' }}</td>
                        <td>
                            <form method="POST" action="{{ route('backlogs.remove.from.dev', [$developer->id, $b->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-remove" onclick="return confirm('Retirer ce backlog ?')">
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

<script>
    $(document).ready(function() {
        $('#backlogs').select2({
            placeholder: "Sélectionnez les backlogs",
            width: '100%',
            allowClear: true
        });
    });
</script>
@endsection
