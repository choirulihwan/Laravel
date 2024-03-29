<div class="overflow-hidden shadow sm:rounded-md">
    <div class="bg-white px-4 py-4 sm:p-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
  
              <table class="w-full text-center border">
                <thead class="border-b bg-gray-50">
                  <tr>
                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">#</th>
                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ __('role.name') }}</th>
                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ __('role.guard') }}</th> 
                    @can(['role-edit', 'role-delete'])                   
                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4"></th>
                    @endcan
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $item)
  
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">{{ $loop->iteration
                      }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">{{ $item->name }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">{{ $item->guard_name }}
                    </td>                    
                    @can(['role-edit', 'role-delete'])
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      <button wire:click="edit({{ $item->id }})"
                        class="inline-flex justify-center rounded-md border border-transparent bg-orange-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">Edit</button>
                      <button onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                        wire:click="destroy({{ $item->id }})"
                        class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{
                        __('general.delete') }}</button>
                    </td>
                    @endcan
                  </tr>
  
                  @endforeach
  
                </tbody>
              </table>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>