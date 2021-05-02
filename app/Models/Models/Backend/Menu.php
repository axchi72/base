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

    private function getMenuPadres($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('role_id', session('role_id'))->orderby('menu_id');
            })->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menu_id')
            ->orderby('orden')
            ->get()
            ->toArray();
        }
    }

    private function getMenuHijos($padres, $line)
    {
        $hijos = [];
        foreach ($padres as $line2) {
            if ($line['id'] == $line2['menu_id']) {
                $hijos = array_merge($hijos, [array_merge($line2, ['submenu' => $this->getHijos($padres, $line)])]);
            }
        }
        return $hijos;
    }

    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $padres = $menus->getMenuPadres($front);
        $menuAll = [];
        foreach ($padres as $line) {
            if ($line['menu_id'] != null)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getMenuHijos($padres, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }
}
