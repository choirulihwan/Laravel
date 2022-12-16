<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        
        return view('layouts.app', [
            // 'menu'  => Menu::where('is_active', true)->get()
            'menu'  => auth()->user()->group->menus,
        ]);
    }
}
