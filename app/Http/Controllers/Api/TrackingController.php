<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function trackPageVisit(Request $request)
    {
        \App\Models\PageVisit::create([
            'url' => $request->input('url'),
            'session_id' => $request->session()->getId(),
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Page visit tracked successfully']);
    }

    public function trackClick(Request $request)
    {
        \App\Models\Click::create([
            'url' => $request->input('url'),
            'element_id' => $request->input('element_id'),
            'element_class' => $request->input('element_class'),
            'session_id' => $request->session()->getId(),
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Click tracked successfully']);
    }

    public function trackFormSubmission(Request $request)
    {
        \App\Models\FormSubmission::create([
            'form_name' => $request->input('form_name'),
            'data' => $request->input('data'),
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'Form submission tracked successfully']);
    }

    public function trackWhatsappInteraction(Request $request)
    {
        $validatedData = $request->validate([
            'event_type' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        \App\Models\WhatsappInteraction::create([
            'event_type' => $validatedData['event_type'],
            'phone_number' => $validatedData['phone_number'],
            'message' => $validatedData['message'],
            'session_id' => $request->session()->getId(),
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'WhatsApp interaction tracked successfully']);
    }
}
