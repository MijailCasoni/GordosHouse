<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Contact;
use App\Models\FormSubmission;
use App\Models\PageVisit;
use App\Models\WhatsappInteraction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getContacts(Request $request)
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();

        return response()->json($contacts);
    }

    public function getStatistics(Request $request)
    {
        $filter = $request->input('filter', 'weekly'); // weekly, monthly, yearly

        $startDate = Carbon::now();

        if ($filter === 'weekly') {
            $startDate->startOfWeek();
        } elseif ($filter === 'monthly') {
            $startDate->startOfMonth();
        } elseif ($filter === 'yearly') {
            $startDate->startOfYear();
        }

        $pageVisits = PageVisit::where('created_at', '>=', $startDate)->count();
        $clicks = Click::where('created_at', '>=', $startDate)->count();
        $formSubmissions = FormSubmission::where('created_at', '>=', $startDate)->count();
        $whatsappInteractions = WhatsappInteraction::where('created_at', '>=', $startDate)->count();

        return response()->json([
            'page_visits' => $pageVisits,
            'clicks' => $clicks,
            'form_submissions' => $formSubmissions,
            'whatsapp_interactions' => $whatsappInteractions,
        ]);
    }

    public function exportCsv(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:contacts,page_visits,clicks,form_submissions,whatsapp_interactions',
            'filter' => 'nullable|in:all,weekly,monthly,yearly',
        ]);

        $type = $validatedData['type']; // contacts, page_visits, clicks, form_submissions, whatsapp_interactions
        $filter = $validatedData['filter'] ?? 'all'; // all, weekly, monthly, yearly

        $startDate = Carbon::now();

        if ($filter === 'weekly') {
            $startDate->startOfWeek();
        } elseif ($filter === 'monthly') {
            $startDate->startOfMonth();
        } elseif ($filter === 'yearly') {
            $startDate->startOfYear();
        }

        $data = [];
        $headers = [];

        switch ($type) {
            case 'contacts':
                $data = Contact::when($filter !== 'all', function ($query) use ($startDate) {
                    $query->where('created_at', '>=', $startDate);
                })->get()->toArray();
                $headers = ['id', 'name', 'email', 'phone', 'message', 'created_at', 'updated_at'];
                break;
            case 'page_visits':
                $data = PageVisit::when($filter !== 'all', function ($query) use ($startDate) {
                    $query->where('created_at', '>=', $startDate);
                })->get()->toArray();
                $headers = ['id', 'url', 'session_id', 'ip_address', 'created_at', 'updated_at'];
                break;
            case 'clicks':
                $data = Click::when($filter !== 'all', function ($query) use ($startDate) {
                    $query->where('created_at', '>=', $startDate);
                })->get()->toArray();
                $headers = ['id', 'url', 'element_id', 'element_class', 'ip_address', 'session_id', 'created_at', 'updated_at'];
                break;
            case 'form_submissions':
                $data = FormSubmission::when($filter !== 'all', function ($query) use ($startDate) {
                    $query->where('created_at', '>=', $startDate);
                })->get()->toArray();
                $headers = ['id', 'form_name', 'data', 'ip_address', 'created_at', 'updated_at'];
                break;
            case 'whatsapp_interactions':
                $data = WhatsappInteraction::when($filter !== 'all', function ($query) use ($startDate) {
                    $query->where('created_at', '>=', $startDate);
                })->get()->toArray();
                $headers = ['id', 'event_type', 'phone_number', 'message', 'ip_address', 'session_id', 'created_at', 'updated_at'];
                break;
            default:
                return response()->json(['error' => 'Invalid export type'], 400);
        }

        if (empty($data)) {
            return response()->json(['message' => 'No data to export'], 200);
        }

        $filename = $type.'_'.$filter.'_'.Carbon::now()->format('Ymd_His').'.csv';

        $callback = function () use ($data, $headers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'";',
        ]);
    }
}
