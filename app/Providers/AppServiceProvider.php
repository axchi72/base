<?php

namespace App\Providers;

use App\Models\Models\Backend\Menu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("theme.back.aside", function ($view) {
            $rol_id = session()->get('role_id');
            $menuP = cache()->tags('Menu')->rememberForever("MenuPrincipal.rolid.$rol_id", function () {
                return Menu::getMenu(true);
            });
            $view->with('menuPrincipal', $menuP);
        });
    }
}
