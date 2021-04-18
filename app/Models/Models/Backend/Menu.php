<?php

namespace App\Models\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'menus_roles', 'menu_id', 'role_id');
    }
}
