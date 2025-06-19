@extends('layouts.guest')

@section('guest-content')
<style>
    :root {
        --primary: #3B82F6;       /* blue-500 */
        --secondary: #6366F1;     /* indigo-500 */
        --background: #F9FAFB;    /* light neutral */
        --background-white: #ffffff;
        --text-dark: #111827;     /* gray-900 */
    }

    body {
        background-color: var(--background);
        font-family: 'Segoe UI', sans-serif;
        color: var(--text-dark);
    }

    .container-role {
        max-width: 460px;
        margin: 5rem auto;
        background: var(--background-white);
        padding: 2.5rem;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.4s ease;
    }

    h2.role-title {
        text-align: center;
        font-size: 1.6rem;
        color: var(--secondary);
        font-weight: bold;
        margin-bottom: 1.8rem;
    }

    select.role-select {
        width: 100%;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        transition: border 0.3s ease;
    }

    select.role-select:focus {
        outline: none;
        border: 2px solid var(--primary);
    }

    .btn-continue {
        display: block;
        width: 100%;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        font-weight: bold;
        font-size: 1rem;
        padding: 0.75rem;
        border-radius: 10px;
        border: none;
        transition: 0.3s ease;
    }

    .btn-continue:hover {
        background: linear-gradient(to right, var(--secondary), var(--primary));
    }

    .btn-continue:disabled {
        background: #045dca;
        cursor: not-allowed;
    }

    .error-msg {
        text-align: center;
        color: #dc2626;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>


<form method="POST" action="{{ route('choisir.role.post') }}" class="container-role">
    @csrf

    <h2 class="role-title">Choisissez votre rôle</h2>

    @if ($errors->any())
        <div class="error-msg">{{ $errors->first() }}</div>
    @endif

    <select name="role" required id="role-select" class="role-select">
        <option value=""> Sélectionnez un rôle </option>
        <option value="product_owner">Product Owner</option>
        <option value="scrum_master">Scrum Master</option>
        <option value="developer">Développeur</option>
    </select>

    <button type="submit" id="btn-continue" class="btn-continue" disabled>
        Continuer
    </button>
</form>

<script>
    const select = document.getElementById('role-select');
    const button = document.getElementById('btn-continue');

    select.addEventListener('change', () => {
        button.disabled = select.value === "";
    });
</script>

@endsection
