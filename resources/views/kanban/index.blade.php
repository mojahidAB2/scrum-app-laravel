<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tableau Kanban</h2>
    </x-slot>

    <div class="py-6 px-4 grid grid-cols-3 gap-4">
        @foreach (['à faire', 'en cours', 'terminé'] as $status)
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-bold capitalize">{{ $status }}</h3>

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <input type="hidden" name="status" value="{{ $status }}">
                    <input type="text" name="title" placeholder="Nouvelle tâche" class="w-full p-1 border my-2">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Ajouter</button>
                </form>

                <ul>
                    @foreach ($tasks[$status] ?? [] as $task)
                        <li class="border p-2 my-2">
                            {{ $task->title }}
                            <form method="POST" action="{{ route('tasks.updateStatus', $task) }}">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    @foreach (['à faire', 'en cours', 'terminé'] as $opt)
                                        <option value="{{ $opt }}" @selected($opt == $task->status)>{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>
