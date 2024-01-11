<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteSettigList = [
            ['option_name'=>'site_title'],
            ['option_name'=>'site_logo'],
            ['option_name'=>'favicon'],
            ['option_name'=>'site_email'],
            ['option_name'=>'site_mobile'],
            ['option_name'=>'footer_text'],
            ['option_name'=>'copyright_text'],
            ['option_name'=>'meta_title'],
            ['option_name'=>'meta_keyword'],
            ['option_name'=>'meta_description'],

            ['option_name'=>'facebook_link'],
            ['option_name'=>'instagram_link'],
            ['option_name'=>'twitter_link'],
            ['option_name'=>'youtube_link'],

            ['option_name'=>'footer_logo'],
            ['option_name'=>'subscribe_title'],
            ['option_name'=>'subscribe_subtitle'],

            ['option_name'=>'site_description'],

        ];
        foreach ($siteSettigList as $key => $value) {
            $count = SiteSetting::where('option_name',$value['option_name'])->count();
            if ($count == 0) {
                \DB::table('site_settings')->insert([
                    'option_name' => $value['option_name'],
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d'),
                ]);
            }
        }
    }
}
