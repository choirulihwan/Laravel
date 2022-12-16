<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors />
                    <x-success-message />

                    <form action="{{ route('profile.update') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}"></x-input>
                                </div>

                                <div>
                                    <x-label for="name" :value="__('Email')"></x-label>
                                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ auth()->user()->email }}"></x-input>
                                </div>
                            </div>

                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="password" :value="__('Password')" />
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                </div>

                                <div>
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required />
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="flex items-center justify-center mt-4">
                            <x-button>
                                {{ __('Update Profile') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
