<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.pages.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            // Handle file uploads
            if ($request->hasFile($key)) {
                $setting = Setting::where('key', $key)->first();
                if ($setting && $setting->value && File::exists(public_path($setting->value))) {
                    File::delete(public_path($setting->value));
                }

                $file = $request->file($key);
                $filename = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/settings'), $filename);
                $value = 'uploads/settings/' . $filename;
            }

            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            \Illuminate\Support\Facades\Cache::forget('setting_' . $key);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
