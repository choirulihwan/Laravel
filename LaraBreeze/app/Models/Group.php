<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'group_menus', 'group_id', 'menu_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'group_modules', 'group_id', 'module_id');
    }
}
