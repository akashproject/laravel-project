<?php

use App\Models\{SiteSetting,Page};
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;

if (!function_exists('siteData')) {
    /**
     * This function uploads files to the filesystem of your choice
     * @param \Illuminate\Http\UploadedFile $file The File to Upload
     * @param string|null $filename The file name
     * @param string|null $folder A specific folder where the file will be stored
     * @param string $disk Your preferred Storage location(s3,public,gcs etc)
     */

   function siteData()
   {
        $site_settings = SiteSetting::all()->pluck('option_value','option_name');

        // dd($site_settings['site_title']);

        return $site_settings;
    }

    function getMenuUrl($slug=''){
        $menu = Menus::where('name', 'Header Menu')->with('items')->first();
        $public_menu = $menu->items->where('id',4)->first();

        return $public_menu;

        dd($public_menu->where('id',4)->first());
        $m = Harimayco\Menu\Models\Menus::where('name','Header Menu')->with('items')->first();
        
    }

}




 ?>