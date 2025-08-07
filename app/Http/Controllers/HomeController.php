<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $settings = Setting::pluck('value', 'key')->toArray();
        $locales = [
            [
            'nombre' => 'Paine',
            'direccion' => 'Prieto 52, Paine',
            'lat' => -33.8139908418571,
            'lng' => -70.74253627265874,
            ],

             [
            'nombre' => 'Buin',
            'direccion' => 'Rogelio Ugarte 141, Buin',
            'lat' => -33.73366184600736,
            'lng' => -70.68671463840863,
            ],

             [
            'nombre' => 'Franklin',
            'direccion' => 'Santa Rosa 2290, Santiago',
            'lat' => -33.47492633846806,
            'lng' => -70.64225227486085,
            ], 
        ];

        return view('welcome', compact('productos', 'settings', 'locales'));
    }
}
