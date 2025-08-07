<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        $producto = null;
        if ($request->has('product_id')) {
            $producto = Producto::find($request->product_id);
        }

        return view('contact.form', compact('producto'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create($validatedData);

        return response()->json(['message' => 'Contact form submitted successfully'], 201);
    }
}
