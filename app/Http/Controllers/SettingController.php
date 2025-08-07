<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
            'banner_subtitle' => 'required|string|max:255',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        // Update banner title and subtitle
        Setting::updateOrCreate(['key' => 'banner_title'], ['value' => $request->banner_title]);
        Setting::updateOrCreate(['key' => 'banner_subtitle'], ['value' => $request->banner_subtitle]);

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $oldImage = Setting::where('key', 'banner_image')->first();
            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }
            $path = $request->file('banner_image')->store('banners', 'public');
            Setting::updateOrCreate(['key' => 'banner_image'], ['value' => $path]);
        }

        return redirect()->route('settings.index')->with('success', 'Configuración del banner actualizada con éxito.');
    }
}
