<?php


namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all()->map(function ($producto) {
            // Imagen por defecto si no hay o no existe
            $producto->image_url = $producto->image_path && Storage::exists('public/' . $producto->image_path)
                ? asset('storage/' . $producto->image_path)
                : asset('img/product_.png');

            // Chequear si la oferta está activa (fecha + precio)
            $now = now();
            $producto->has_offer = $producto->is_on_offer &&
                $producto->offer_price !== null &&
                $producto->offer_start_date <= $now &&
                $producto->offer_end_date >= $now;

            return $producto;
        });

        return view('welcome', compact('productos'));
    }

    // Crear nuevo producto
    public function create()
    {
        return view('products.create');
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:productos,nombre',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'image' => 'nullable|image',
            'is_on_offer' => 'boolean',
            'offer_price' => 'nullable|numeric',
            'offer_start_date' => 'nullable|date',
            'offer_end_date' => 'nullable|date|after_or_equal:offer_start_date',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
            $validated['image_path'] = 'images/' . $filename;
        }

        Producto::create($validated);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    }

    // Mostrar producto
    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->image_url = $producto->image_path && Storage::exists('public/' . $producto->image_path)
            ? asset('storage/' . $producto->image_path)
            : asset('img/product_.png');

        return view('products.show', compact('producto'));
    }

    // Editar producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('products.edit', compact('producto'));
    }

    // Actualizar producto
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:productos,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'image' => 'nullable|image',
            'is_on_offer' => 'boolean',
            'offer_price' => 'nullable|numeric',
            'offer_start_date' => 'nullable|date',
            'offer_end_date' => 'nullable|date|after_or_equal:offer_start_date',
        ]);

        if ($request->hasFile('image')) {
            if ($producto->image_path && Storage::exists('public/' . $producto->image_path)) {
                Storage::delete('public/' . $producto->image_path);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
            $validated['image_path'] = 'images/' . $filename;
        }

        $producto->update($validated);

        return redirect()->route('products.show', $producto->id)->with('success', 'Producto actualizado exitosamente');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->image_path && Storage::exists('public/' . $producto->image_path)) {
            Storage::delete('public/' . $producto->image_path);
        }

        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    }
}
