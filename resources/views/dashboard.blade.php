<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                   
                </div>
               
            </div>
            
        </div>
    </div>
    <div>
        <!-- Bouton vers les projets -->
        <a href="{{ route('projects.index') }}"  class="inline-block mt-4 bg-blue-600 hover:bg-blue-800 text-black font-bold py-2 px-4 rounded">
           Projets
       </a>
    </div>
</x-app-layout>