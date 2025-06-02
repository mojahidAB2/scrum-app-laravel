@extends('layouts.guest')

@section('guest-content')
    <form method="POST" action="{{ route('choisir.role.post') }}" class="max-w-md mx-auto bg-white p-6 rounded shadow">
        @csrf
        <h2 class="text-xl font-bold mb-4 text-center text-[#ba3dd1]">Choisissez votre rôle</h2>

        @if ($errors->any())
            <div class="text-red-500 mb-4 font-semibold">
                {{ $errors->first() }}
            </div>
        @endif

        <select name="role" required class="w-full p-2 mb-4 border border-gray-300 rounded">
            <option value="">-- Sélectionnez un rôle --</option>
            <option value="product_owner">Product Owner</option>
            <option value="scrum_master">Scrum Master</option>
            <option value="developer">Développeur</option>
        </select>

        <button type="submit" disabled
    class="w-full bg-[#320a39] hover:bg-[#657318] text-white font-semibold py-2 px-4 rounded">
    Continuer
</button>
<!-- JavaScript pour activer le bouton si le rôle n'est pas sélectionné -->
<script>
    const select = document.querySelector('select[name="role"]');
    const button = document.querySelector('button[type="submit"]');

    select.addEventListener('change', function () {
        button.disabled = this.value === "";
    });

    // Initial check
    button.disabled = select.value === "";
</script>

    </form>
@endsection
