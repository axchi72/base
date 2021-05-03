<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Models\Backend\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id')->get();
        $menus = Menu::getMenu();
        $menusRoles = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('theme.back.menu-role.index', compact('roles', 'menus', 'menusRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $menu = Menu::findOrFail($request->menu_id);
            cache()->tags('Menu')->flush();
            if ($request->estado == 1) {
                $menu->roles()->attach($request->role_id);
                return response()->json(['respuesta' => 'El role se asigno correctamente']);
            } else {
                $menu->roles()->detach($request->role_id);
                return response()->json(['respuesta' => 'El role se elimino correctamente']);
            }

        } else {
            abort(404);
        }

    }


}
