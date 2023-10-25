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
                        <form action="{{ route('menu.update', $menu->id) }}" method="post">   
                        @method('PUT')
                    @else
                        <form action="{{ route('menu.store') }}" method="post">
                    @endif 

                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Menu name')"></x-label>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ isset($menu) ? $menu->name : old('name') }}" required autofocus></x-input>
                                </div>

                                <div>
                                    <x-label for="link" :value="__('Menu Link')"></x-label>
                                    <x-input id="link" class="block mt-1 w-full" type="text" name="link" value="{{ isset($menu) ? $menu->link : old('link') }}" required></x-input>
                                </div>
                            </div>

                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="icon" :value="__('Menu icon')"></x-label>
                                    <x-input id="icon" class="block mt-1 w-full" type="text" name="icon" value="{{ isset($menu) ? $menu->icon : old('icon') }}"></x-input>
                                </div>

                                <div>
                                    <x-label for="is_active" :value="__('Status')"></x-label>
                                    @php
                                        $arr_active = [
                                            ['id' => 1, 'name' => 'Aktif'],
                                            ['id' => 0, 'name' => 'Not Aktif']
                                        ];                                        
                                    @endphp
                                    <x-select name="is_active" id="is_active" :items="json_encode($arr_active)" :selected="__(isset($menu) ? $menu->is_active : '-')"></x-select>
                                </div>
                            </div>

                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="parent" :value="__('Menu Parent')"></x-label>                                    
                                    <x-select name="parent" id="parent" :items="json_encode($parent)" :selected="__(isset($menu->parent->id) ? $menu->parent->id : '-')"></x-select>
                                </div>

                                <div>
                                    <x-label for="urutan" :value="__('Menu urutan')"></x-label>
                                    <x-input id="urutan" class="block mt-1 w-full" type="number" name="urutan" value="{{ isset($menu) ? $menu->menu_order : old('urutan') }}"></x-input>
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
