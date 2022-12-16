<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['menu'];

    public function menu() 
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_modules', 'module_id', 'group_id');
    }
}
