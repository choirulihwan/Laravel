{{-- <div>   --}}
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-4 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-1 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Kode Group</label>
                    </div>
                    <div class="col-span-2">                        
                        <input type="text" wire:model="id_ref" autocomplete="address-level1" placeholder="Input kode group..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>  

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-1 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Kode Ref</label> 
                    </div>
                    <div class="col-span-2">
                        <input type="text" wire:model="no_ref" placeholder="Input no.ref..." class="mt-1 block w-9/12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>  

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-1 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label> 
                    </div>
                    <div class="col-span-4">
                        <input type="text" wire:model="keterangan" placeholder="Input keterangan..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>  

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-1 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Keterangan Label</label> 
                    </div>
                    <div class="col-span-4">
                        <input type="text" wire:model="keterangan2" placeholder="Input label reference.." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div> 
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button wire:click="reset_input" class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Reset</button>
                <button 
              @if ($editState)
                wire:click="update({{ $refs->id }})"
              @else
                wire:click="store"  
              @endif 
              class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save
                </button>
            </div>
              
          
{{-- </div> --}}
