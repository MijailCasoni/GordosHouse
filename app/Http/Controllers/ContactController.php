<?php

namespace App\Http\Controllers;


use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        try {
            Mail::to('claudiomunoz@gordoshouse.cl')->send(new ContactMessage($data));
            return back()->with('success', '¡Tu mensaje ha sido enviado con éxito!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al enviar el mensaje. Inténtalo más tarde.');
        }
    }
}

