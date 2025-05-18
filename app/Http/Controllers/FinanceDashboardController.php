<?php


namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Http\Request;

class FinanceDashboardController extends Controller
{
    // Tampilkan tabel dashboard
    public function index()
    {
        // hanya yg sudah upload bukti pembayaran
        $registrations = EventRegistration::with(['user','event'])
                          ->whereNotNull('payment_proof')
                          ->orderByDesc('created_at')
                          ->get();

        return view('finance.dashboard', compact('registrations'));
    }

    // Verifikasi (approve / reject)
    public function verify(Request $request, EventRegistration $registration)
    {
        $request->validate([
            'action' => 'required|in:approved,rejected',
        ]);

        $registration->update(['payment_status' => $request->action]);

        return back()->with('success', 'Status pembayaran diperbarui!');
    }
}
