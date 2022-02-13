<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::where('id', '=', '1')->first();
        return view('dashboard.admin.setting.edit', compact('setting'));
    }

    public function settingUpdate(Request $request)
    {
        $setting =  Setting::find($request->id);
        $setting->company_name = $request->company_name;
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;
        $setting->company_address = $request->company_address;
        $setting->company_website_link = $request->company_website_link;

        if ($request->hasFile('company_logo')) {
            if (!empty($setting->company_logo) && ($setting->company_logo != "assets/images/crmLogo.png")) {
                $logo_path = $setting->company_logo;
                unlink($logo_path);
            }
            $logo = $request->file('company_logo');
            $name = time() . 'logo' . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'public/company_logo/';
            $logo->move($destinationPath, $name);
            $setting->company_logo = 'company_logo/' . $name;
        }

        if ($request->hasFile('company_favicon')) {
            if (!empty($setting->company_favicon) && ($setting->company_favicon != "assets/images/crmLogo.png")) {
                $icon_path = $setting->company_favicon;
                unlink($icon_path);
            }
            $logo = $request->file('company_favicon');
            $name = time() . 'icon' . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'public/company_favicon/';
            $logo->move($destinationPath, $name);
            $setting->company_favicon = 'company_favicon/' . $name;
        }

        $setting->update();
        $notification = array(
            'messege' => 'Setting Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
