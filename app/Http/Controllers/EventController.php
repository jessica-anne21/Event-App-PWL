<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function index()
{

    // Ambil semua event, tanpa filter committee
    $events = Event::all();

    return view('committee.dashboard', compact('events'));
}

 

public function store(Request $request)
{
    // Debug sementara
    // dd($request->all());

    $validated = $request->validate([
        'name' => 'required|string',
        'main_event_datetime' => 'required|date',
        'sub_event_datetime' => 'nullable|date',
        'location' => 'required|string',
        'speaker' => 'required|string',
        'description' => 'nullable|string',
        'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'fee' => 'required|numeric',
        'quota' => 'required|integer',
    ]);

    if ($request->hasFile('poster')) {
        $validated['poster'] = $request->file('poster')->store('posters', 'public');
    }

    $validated['created_by'] = auth()->id(); // penting!

    Event::create($validated);

    return redirect()->back()->with('success', 'Event berhasil ditambahkan!');
}

public function destroy($id)
{
    $event = Event::findOrFail($id);

    // Opsional: Pastikan hanya committee yang bisa menghapus event-nya sendiri
    if ($event->committee_id != Auth::id()) {
        abort(403, 'Tidak diizinkan.');
    }

    $event->delete();

    return redirect()->back()->with('success', 'Event berhasil dihapus.');
}

public function close($id)
{
    $event = Event::findOrFail($id);

    // Opsional: Pastikan hanya committee yang bisa menutup event-nya sendiri
    if ($event->committee_id != Auth::id()) {
        abort(403, 'Tidak diizinkan.');
    }

    $event->is_closed = true;
    $event->save();

    return redirect()->back()->with('success', 'Event telah ditutup.');
}
}