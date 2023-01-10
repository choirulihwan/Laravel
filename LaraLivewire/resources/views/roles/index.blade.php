<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('role.title') }}
        </h2>
    </x-slot>
    
    <div class="py-6">
        @can('role-create')        
            @livewire('role.create')                        
        @endcan

        <br>
        
        @can('role-list')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('role.table')
            </div>
        </div>
        @endcan

    </div>
</x-app-layout>
