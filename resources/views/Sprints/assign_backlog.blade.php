@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #573391, #357C3C, #EF6D6D, #FFE6AB);
        background-size: 400% 400%;
        animation: gradientAnim 10s ease infinite;
    }

    @keyframes gradientAnim {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .form-container {
        max-width: 600px;
        margin: 60px auto;
        background: #ffffffcc;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        backdrop-filter: blur(6px);
    }

    h2 {
        text-align: center;
        color: #573391;
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    select {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    .btn-submit {
        background: linear-gradient(to right, #357C3C, #EF6D6D);
        color: white;
        font-weight: bold;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        transition: background 0.3s ease;
        width: 100%;
        margin-top: 25px;
    }

    .btn-submit:hover {
        background: linear-gradient(to right, #2c7031, #d75454);
    }
</style>

<div class="form-container">
    <h2>Assigner un Backlog au Sprint</h2>

    <form method="POST" action="{{ route('sprints.assign.backlog', $sprint->id) }}">
        @csrf

        <div class="mb-3">
            <label for="backlog_id">Sélectionnez un Backlog :</label>
            <select name="backlog_id" id="backlog_id" required>
                <option value=""> Choisir un backlog</option>
                @foreach($backlogs as $backlog)
                    <option value="{{ $backlog->id }}">{{ $backlog->titre }} ({{ $backlog->priorite }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">Assigner</button>
    </form>
</div>
@endsection
