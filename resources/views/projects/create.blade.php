@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-[#ba3dd1] mb-6">Ajouter un nouveau projet</h2>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom du projet</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
                </div>

                <div>
                    <label for="scrum_master" class="block text-sm font-medium text-gray-700">Scrum Master</label>
                    <input type="text" name="scrum_master" id="scrum_master"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                    <input type="date" name="start_date" id="start_date" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                    <input type="date" name="end_date" id="end_date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]">
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#f18ac5] focus:border-[#f18ac5]"></textarea>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="bg-[#ba3dd1] hover:bg-[#a92dc0] text-white font-semibold py-2 px-6 rounded-md shadow">
                    Enregistrer
                </button>
                <a href="{{ route('projects.index') }}" class="ml-4 text-[#f18ac5] hover:underline">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
