<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors />                    
                    @if ($is_edit)
                        <form action="{{ route('module.update', $module->id) }}" method="post">   
                        @method('PUT')
                    @else
                        <form action="{{ route('module.store') }}" method="post">
                    @endif 

                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Module name')"></x-label>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ isset($module) ? $module->name : old('name') }}" required autofocus></x-input>
                                </div>

                                <div>
                                    <x-label for="label" :value="__('Module Label')"></x-label>
                                    <x-input id="label" class="block mt-1 w-full" type="text" name="label" value="{{ isset($module) ? $module->link : old('label') }}" required></x-input>
                                </div>
                            </div>

                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="link" :value="__('Module Link')"></x-label>
                                    <x-input id="link" class="block mt-1 w-full" type="text" name="link" value="{{ isset($module) ? $module->link : old('link') }}" required></x-input>
                                </div>

                                <div>
                                    <x-label for="is_active" :value="__('Status')"></x-label>
                                    @php
                                        $arr_active = [
                                            ['id' => 1, 'name' => 'Aktif'],
                                            ['id' => 0, 'name' => 'Not Aktif']
                                        ];                                        
                                    @endphp
                                    <x-select name="is_active" id="is_active" :items="json_encode($arr_active)" :selected="__((isset($module)) ? $module->is_active : old('is_active'))"></x-select>
                                </div>
                            </div>

                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="menu_id" :value="__('Module Menu')"></x-label>                                    
                                    <x-select name="menu_id" id="menu_id" :items="json_encode($menu)" :selected="__( isset($module) ? $module->menu_id : old('menu_id'))"></x-select>
                                </div>                                
                            </div>
                            
                        </div>
                        <br/>
                        <div class="flex items-center justify-center mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                            <x-nav-link-button :href="route('user.index')" :type="'warning'" class="ml-1">
                                {{ __('Cancel') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
