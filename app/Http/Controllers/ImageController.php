<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('public/images');

        Image::create([
            'path' => Storage::url($path),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $image->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('images.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(Image $image)
    {
        Storage::delete(str_replace('/storage', 'public', $image->path));
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image deleted successfully.');
    }
}
