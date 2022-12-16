<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors />                    
                    @if ($is_edit)
                        <form action="{{ route('user.update', $user->id) }}" method="post">   
                        @method('PUT')
                    @else
                        <form action="{{ route('user.store') }}" method="post">
                    @endif 

                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Full name')"></x-label>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required autofocus></x-input>
                                </div>
                            </div>

                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="email" :value="__('Email')"></x-label>
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required></x-input>
                                </div>
                            </div>

                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="group" :value="__('Group')"></x-label>
                                    <x-select name="group_id" id="group_id" :items="json_encode($groups)" :selected="__(isset($user) ? $user->group->id : old('group_id'))"></x-select>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="flex items-center justify-center mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                            <x-nav-link-button :href="route('group.index')" :type="'warning'" class="ml-1">
                                {{ __('Cancel') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
