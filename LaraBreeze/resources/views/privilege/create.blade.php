<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Privilege') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <x-validation-errors />                    
                   
                    <form action="{{ route('privilege.update', $group->id) }}" method="post">   
                        @method('PUT')                   

                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Group name')"></x-label>
                                    <x-input disabled id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $group->name }}"></x-input>
                                </div>

                                <div>
                                    <x-label for="privilege" :value="__('Privileges')"></x-label>
                                    <table class="table-auto w-full">
                                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                            <tr>
                                                <th class="p-2">
                                                    <div class="font-semibold text-left">Menu (Module)</div>
                                                </th>  
                                                                                                                               
                                            </tr>
                                        </thead>
                                        
                                        @php                                            
                                        foreach($group->modules as $gm):
                                            $arr_gm[] = $gm->pivot->module_id;                                            
                                        endforeach; 
                                        foreach($group->menus as $gmn):
                                            $arr_gmn[] = $gmn->pivot->menu_id;                                            
                                        endforeach;                                            
                                        @endphp
                                        
                                        <tbody class="text-sm divide-y divide-gray-100">                                        
                                            @foreach ($menus as $menu)
                                            <tr>                                                
                                                <td class="p-2">
                                                    @if ($menu->parent == null)
                                                        <div class="font-medium">
                                                    @else
                                                        <div class="font-medium ml-10">    
                                                    @endif  
                                                    @php
                                                        $mn_checked = '';
                                                        if(!empty($arr_gmn)):
                                                            foreach($arr_gmn as $gmn):
                                                                if ($gmn == $menu->id):
                                                                    $mn_checked = 'checked';
                                                                    break;
                                                                else:
                                                                    $mn_checked = '';
                                                                endif;
                                                            endforeach;                                                             
                                                        endif;                                                               
                                                    @endphp                                                  
                                                    <input {{ $mn_checked }} type="checkbox" name="menu[]" class="w-5 h-5" value="{{ $menu->id }}" @click="toggleCheckbox($el, 2890.66)" />&nbsp;&nbsp;{{ $menu->name }}                                                        
                                                    </div>

                                                    <div class="flex flex-row">
                                                    @foreach ($menu->modules as $module)
                                                        <div class="font-medium ml-20 my-3">
                                                            @php
                                                            $checked = '';
                                                            if(!empty($arr_gm)):
                                                                foreach($arr_gm as $gm):
                                                                    if ($gm == $module->id):
                                                                        $checked = 'checked';
                                                                        break;
                                                                    else:
                                                                        $checked = '';
                                                                    endif;
                                                                endforeach;                                                             
                                                            endif;                                                               
                                                            @endphp
                                                            <input {{ $checked }} type="checkbox" class="w-5 h-5" name="module[]" value="{{ $module->id }}" @click="toggleCheckbox($el, 2890.66)" />&nbsp;&nbsp;{{ $module->label }}
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </td> 
                                            </tr>
                                            @endforeach                
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <br/>
                        <div class="flex items-center justify-center mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                            <x-nav-link-button :href="route('privilege.index')" :type="'warning'" class="ml-1">
                                {{ __('Cancel') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
