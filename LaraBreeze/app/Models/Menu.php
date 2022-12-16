<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $with = ['parent'];

    public function child() 
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id');
    }

    public function parent() 
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_menu', 'group_id', 'group_id');
    }

    public function modules() 
    {
        return $this->hasMany(Module::class, 'menu_id', 'id');
    }
}
