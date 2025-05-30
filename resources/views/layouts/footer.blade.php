<footer class="bg-[#d5d8ad] text-white mt-10 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- 🧠 Logo + Nom --}}
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo.jpg') }}" alt="Logo PredictiveMind" class="h-10 rounded shadow-md">
            <span class="text-xl font-bold text-gray-900">PredictiveMind</span>
        </div>

        {{-- 📬 Contact --}}
        <div>
            <h4 class="text-lg font-semibold mb-3 text-gray-900">Contact</h4>
            <p class="text-sm text-gray-800">
                <i class="fas fa-envelope me-2 text-[#4A249D]"></i> contact@predictivemind.com
            </p>
            <p class="text-sm text-gray-800">
                <i class="fas fa-phone me-2 text-[#4A249D]"></i> +212 6 00 00 00 00
            </p>
        </div>
    </div>

    {{-- © Copyright --}}
    <div class="bg-[#686a69] text-center text-sm py-3">
        © {{ date('Y') }} PredictiveMind. Tous droits réservés.
    </div>
</footer>

{{-- Font Awesome CDN (ajoute le si pas déjà موجود) --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
