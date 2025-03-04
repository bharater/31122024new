<?php
namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first() ?? new Setting;

        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                $oldLogoPath = public_path('uploads/logos/' . $settings->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/logos'), $logoName);
            $settings->logo = $logoName;
        }

        $settings->fill([
            'website_name' => $request->website_name,
            'website_url' => $request->website_url,
            'page_title' => $request->page_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'address' => $request->address,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'header_bg_color' => $request->header_bg_color,
            'footer_bg_color' => $request->footer_bg_color,
            'link_color' => $request->link_color,
            'font_color' => $request->font_color,
        ])->save();

        return redirect()->back()->with('message', 'Settings updated successfully');
    }
}
