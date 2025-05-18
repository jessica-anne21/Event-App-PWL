<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Models\EventRegistration;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $eventName = $request->input('event');
        $event = Event::where('name', $eventName)->firstOrFail();

        return view('bayar', compact('event'));
    }



public function process(Request $request)
{
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'payment_method' => 'required|string|max:255',
        'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $file = $request->file('payment_proof');
    $filename = 'proof_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
    $filePath = $file->storeAs('public/payment_proofs', $filename);

    EventRegistration::create([
        'event_id' => $request->event_id,
        'user_id' => auth()->id(),
        'payment_proof' => $filePath,
        'payment_status' => 'pending', // atau "waiting_verification"
        'is_attended' => false,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/')->with('status', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi.');
}

}
