<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteSetting;
use Batch;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    protected $siteSettings;

    public function __construct(){
        $this->siteSettings = SiteSetting::all()->pluck('option_value','option_name');
    }

    public function adminAccountSettings()
    {
        $user = Auth::user();
        $siteSettings = $this->siteSettings;
        return view('backend.settings.admin-account-settings',compact('user','siteSettings'));
    }


    public function updateSiteSetting(Request $request)
    {
         $values = $request->validate([
            "site_title" => 'required|string|max:100',
            "site_logo" => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            "footer_logo" => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            "favicon" => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            // "copyright_text" => 'required|string|max:200',
            // "footer_text" => 'nullable|string|max:200',
            // "linkedin_link" => 'required|string|max:200',
        ]);

        $data = [];
        foreach ($this->siteSettings as $option_name => $value) {
            // dd($value);
            if ($option_name == 'site_logo' || $option_name == 'favicon' || $option_name == 'footer_logo') {
                continue;
            }
            array_push($data,
            [
                'option_name' => $option_name,
                'option_value' => $request->{$option_name},
            ]);
        }

        if ($request->site_logo_rmv_exist_image == 1 && Storage::exists('public/site_settings/' . $this->siteSettings['site_logo'])){
            Storage::delete('public/site_settings/' . $this->siteSettings['site_logo']);
            $site_logo_file = null;
            array_push($data, [
                'option_name' => 'site_logo',
                'option_value' => $site_logo_file,
            ]);
        }

        if ($request->hasFile('site_logo')) {
            if (!empty($this->siteSettings['site_logo']) && Storage::exists('public/site_settings/' . $this->siteSettings['site_logo'])){
                Storage::delete('public/site_settings/' . $this->siteSettings['site_logo']);
            }
            $site_logo = $request->file('site_logo');
            $ext = $site_logo->extension();
            $site_logo_file = time() . '_logo.' . $ext;
            $site_logo->storeAs('/public/site_settings/', $site_logo_file);

            array_push($data, [
                'option_name' => 'site_logo',
                'option_value' => $site_logo_file,
            ]);
        }

        if ($request->favicon_rmv_exist_image == 1 && Storage::exists('public/site_settings/' . $this->siteSettings['favicon'])){
            Storage::delete('public/site_settings/' . $this->siteSettings['favicon']);
            $favicon_file = null;
            array_push($data, [
                'option_name' => 'favicon',
                'option_value' => $favicon_file,
            ]);
        }

        if ($request->hasFile('favicon')) {
            if (!empty($this->siteSettings['favicon']) && Storage::exists('public/site_settings/' . $this->siteSettings['favicon'])) {
                Storage::delete('public/site_settings/' . $this->siteSettings['favicon']);
            }
            $favicon = $request->file('favicon');
            $favicon_ext = $favicon->extension();
            $favicon_file = time() . '_favicon.' . $favicon_ext;
            $favicon->storeAs('/public/site_settings/', $favicon_file);

            array_push($data, [
                'option_name' => 'favicon',
                'option_value' => $favicon_file,
            ]);
        }

        if ($request->footer_logo_rmv_exist_image == 1 && Storage::exists('public/site_settings/' . $this->siteSettings['footer_logo'])){
            Storage::delete('public/site_settings/' . $this->siteSettings['footer_logo']);
            $footer_logo_file = null;
            array_push($data, [
                'option_name' => 'footer_logo',
                'option_value' => $footer_logo_file,
            ]);
        }

        if ($request->hasFile('footer_logo')) {
            if (!empty($this->siteSettings['footer_logo']) && Storage::exists('public/site_settings/' . $this->siteSettings['footer_logo'])){
                Storage::delete('public/site_settings/' . $this->siteSettings['footer_logo']);
            }
            $footer_logo = $request->file('footer_logo');
            $ext = $footer_logo->extension();
            $footer_logo_file = time() . '_logo.' . $ext;
            $footer_logo->storeAs('/public/site_settings/', $footer_logo_file);

            array_push($data, [
                'option_name' => 'footer_logo',
                'option_value' => $footer_logo_file,
            ]);
        }

        $siteSetting = new SiteSetting();
        Batch::update($siteSetting, $data, 'option_name');
        return redirect()->back()->with('success','Record has been successfully updated!!');
    }

}

