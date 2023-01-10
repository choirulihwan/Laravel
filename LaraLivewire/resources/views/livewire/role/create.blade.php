<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{ session('message') }}
        </div>
    @endif 
    
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="overflow-hidden shadow sm:rounded-md">
        <div class="bg-white px-4 py-4 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-1 pt-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('role.name') }}</label>
                </div>
                <div class="col-span-2">
                    <input type="text" wire:model="name" placeholder="Input name..."
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" autofocus>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-1 pt-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('role.permission') }}</label>
                </div>
                <div class="col-span-2">
                    @foreach($permission as $value)                            
                        <input type="checkbox" wire:model.defer="rolePermission"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            value="{{ $value->id }}">
                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->name }}</label>
                        <br/>
                    @endforeach
                    @error('rolePermission') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
        <button wire:click="reset_input"
            class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Reset</button>
        <button @if ($editState) wire:click="update({{ $roles->id }})" @else wire:click="store" @endif
            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{
            __('general.save') }}
        </button>
    </div>
    </div>
</div>