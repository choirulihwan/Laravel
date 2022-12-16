<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu management') }}
        </h2>
        @can('access', 'create')
        <div class="flex items-center justify-end">        
            <x-nav-link-button :href="route('menu.create')" :type="'success'">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ __('Create') }}
            </x-nav-link-button>
        </div>
        @endcan
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th>#</th>
                                <th class="p-2"><div class="font-semibold text-center">Name</div></th>
                                <th class="p-2"><div class="font-semibold text-center">Link</div></th>                                
                                <th class="p-2"><div class="font-semibold text-center">Icon</div></th>
                                <th class="p-2"><div class="font-semibold text-center">Active</div></th>
                                <th class="p-2"><div class="font-semibold text-center">Parent</div></th>                                
                                <th class="p-2"><div class="font-semibold text-center">Order</div></th>
                                <th class="p-2"><div class="font-semibold text-center">Action</div></th>
                            </tr>
                        </thead>
    
                        <tbody class="text-sm divide-y divide-gray-100">
                            {{ $collection }}
                            @foreach ($collection as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">{{ $item->name }}</div>
                                </td>  
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">{{ $item->link }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">{{ $item->icon }}</div>
                                </td> 
                                <td class="p-2">
                                    <div class="font-medium text-gray-800 text-center">{{ $item->is_active }}</div>
                                </td>  
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">{{ (isset($item->parent) ? $item->parent->name : '') }}</div>
                                </td> 
                                <td class="p-2">
                                    <div class="font-medium text-gray-800 text-end">{{ $item->menu_order }}</div>
                                </td>                               
                                <td class="p-2">
                                    <div class="flex justify-center">
                                        @can('access', 'edit')
                                        <x-nav-link-button :href="route('menu.edit', $item->id)" :type="'warning'">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>                                            
                                        </x-nav-link>
                                        @endcan
                                        
                                        @can('access', 'destroy')
                                            <form action="{{ route('menu.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            
                                            <x-button-dynamic :type="'danger'" class="ml-1" onclick="return confirm('Are you sure?')">
                                            <svg class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">                                                
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>                                            
                                            </x-button>
                                          </form>
                                        @endcan
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $collection->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
