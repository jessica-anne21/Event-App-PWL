<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
 

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
}