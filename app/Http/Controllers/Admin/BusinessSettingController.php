<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessSettingController extends Controller
{

    public function index()
    {
        return view('admin.generale-setting.index');
    }

    public function socialLinks()
    {
        return view('admin.generale-setting.social-link');
    }
    public function news()
    {
        return view('admin.generale-setting.news');
    }
    public function businessSettingUpdate(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            // If input is a file
            if ($request->hasFile($key)) {
                // Optional: validate the file
                $request->validate([
                   $key => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:102400'
                ]);

                // Delete old image if exists
                $old = BusinessSetting::where('key', $key)->first();
                if ($old && $old->value && Storage::disk('public')->exists($old->value)) {
                    Storage::disk('public')->delete($old->value);
                }
                // Store new file
                $value = $request->file($key)->store('business_setting_images', 'public');
            }
            BusinessSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return response()->report(true, 'Update Successfully!');
    }
    public function apps()
    {
        return view('admin.generale-setting.apps');
    }

    public function appsUpload(Request $request)
    {
        $request->validate([
            'apps' => 'required|file',
        ]);

        $file = $request->file('apps');

        // Delete old APK if exists
        $old = BusinessSetting::where('key', 'apps')->first();
        if ($old && $old->value && Storage::disk('public')->exists($old->value)) {
            Storage::disk('public')->delete($old->value);
        }

        // Preserve original name and force .apk extension
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $path = $file->storeAs('business_apps', $originalName . '.apk', 'public');

        // Save to DB
        BusinessSetting::updateOrCreate(
            ['key' => 'apps'],
            ['value' => $path]
        );

        return response()->report(true, 'Update Successfully!');
    }
}
