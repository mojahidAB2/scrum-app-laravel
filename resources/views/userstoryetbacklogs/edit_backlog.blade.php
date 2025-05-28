@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold text-center text-yellow-500 mb-8"> Modifier un Backlog</h2>

    <form method="POST" action="{{ route('backlogs.update', $backlog->id) }}" class="bg-white shadow-md rounded-lg p-6 space-y-5">
        @csrf
        @method('PUT')

        {{-- 🔢 Project ID --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Project ID</label>
            <input type="number" name="project_id" value="{{ $backlog->project_id }}" required
                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- 📝 Titre --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="titre" value="{{ $backlog->titre }}" required
                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- 📄 Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="description" value="{{ $backlog->description }}" required
                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
        </div>

        {{-- 🔗 Liaison User Story --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Associer à une User Story</label>
            <select name="user_story_id"
                class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:ring-[#ba3dd1] focus:border-[#ba3dd1]">
                <option value="">-- Aucune --</option>
                @foreach ($userStories as $story)
                    <option value="{{ $story->id }}" {{ $backlog->user_story_id == $story->id ? 'selected' : '' }}>
                        {{ $story->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 🔘 Boutons --}}
        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('backlogs.view') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
               ↩ Retour
            </a>
            <button type="submit"
                class="bg-[#ba3dd1] hover:bg-[#a72abc] text-white font-semibold px-6 py-2 rounded shadow">
                 Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
