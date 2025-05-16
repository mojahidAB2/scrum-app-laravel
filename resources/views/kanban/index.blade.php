<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tableau Kanban</h2>
    </x-slot>

    <div class="py-6 px-4 grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach (['à faire', 'en cours', 'terminé'] as $status)
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-bold capitalize text-center mb-4">{{ ucfirst($status) }}</h3>

                @if (isset($tasks[$status]) && count($tasks[$status]) > 0)
                    @foreach ($tasks[$status] as $task)
                        <div class="border p-2 my-2 rounded bg-gray-100">
                            <strong>{{ $task->title }}</strong>
                            <p>{{ $task->description }}</p>
                            <p class="text-xs text-gray-500">Sprint: {{ $task->sprint->name ?? '-' }}</p>
                            <p class="text-xs text-gray-500">Assigné: {{ $task->user->name ?? '-' }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-400">Aucune tâche</p>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
