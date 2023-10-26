<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Reference') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors />                    
                    @if ($is_edit)
                        <form action="{{ route('referensi.update', $referensi->id) }}" method="post">   
                        @method('PUT')
                    @else
                        <form action="{{ route('referensi.store') }}" method="post">
                    @endif 

                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="id_ref" :value="__('Reference Group')"></x-label>
                                    <x-input id="id_ref" class="block mt-1 w-full" type="text" name="id_ref" value="{{ isset($referensi) ? $referensi->id_ref : old('id_ref') }}" required autofocus></x-input>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="no_ref" :value="__('Reference name')"></x-label>
                                    <x-input id="no_ref" class="block mt-1 w-full" type="text" name="no_ref" value="{{ isset($referensi) ? $referensi->no_ref : old('no_ref') }}" required autofocus></x-input>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="keterangan" :value="__('Reference value')"></x-label>
                                    <x-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" value="{{ isset($referensi) ? $referensi->keterangan : old('keterangan') }}" required autofocus></x-input>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="keterangan_label" :value="__('Reference Description')"></x-label>
                                    <x-input id="keterangan_label" class="block mt-1 w-full" type="text" name="keterangan_label" value="{{ isset($referensi) ? $referensi->keterangan_label : old('keterangan_label') }}" required autofocus></x-input>
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
