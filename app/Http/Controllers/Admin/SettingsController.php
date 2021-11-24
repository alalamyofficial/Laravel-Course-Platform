<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function settings(){

        $settings = Setting::latest()->limit(1)->get();
        return view('admin.settings.edit_site',compact('settings'));

    }

    public function update(Request $request){

        $settings = new Setting;
        
        $settings->site_name = $request->site_name;
        $settings->about = $request->about;


        $settings->save();

        return back();

    }
}
