<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ValidacionMenu;
use App\Models\Models\Backend\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('theme.back.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.back.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionMenu $request)
    {
        $request->request->add(['createdby' => auth()->user()->user]);
        Menu::create($request->all());
        cache()->tags('Menu')->flush();
        return redirect()->route('menu')->with('mensaje', 'Menú creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Menu::findOrFail($id);
        return view('theme.back.menu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMenu $request, $id)
    {
        $request->request->add(['updatedby' => auth()->user()->user]);
        Menu::findOrFail($id)->update($request->all());
        cache()->tags('Menu')->flush();
        return redirect()->route('menu')->with('mensaje', 'Menú actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        cache()->tags('Menu')->flush();
        return redirect()->route('menu')->with('mensaje', 'Menú eliminado con exito');
    }

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            Menu::guardarOrden($request->menu);
            cache()->tags('Menu')->flush();
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
