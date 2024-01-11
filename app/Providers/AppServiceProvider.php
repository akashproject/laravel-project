<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = SiteSetting::all()->pluck('option_value','option_name');
        View::share('setting', $setting);
        $header_menus = \Menu::getByName('Header Menu');
        View::share('header_menus', $header_menus);
        Paginator::useBootstrap();
        
        $footer_menus_1 = \Menu::getByName('Footer Menu 1');
        View::share('footer_menus_1', $footer_menus_1);

        $footer_menus_2 = \Menu::getByName('Footer Menu 2');
        View::share('footer_menus_2', $footer_menus_2);

        $footer_menus_3 = \Menu::getByName('Footer Menu 3');
        View::share('footer_menus_3', $footer_menus_3);
    }
}
