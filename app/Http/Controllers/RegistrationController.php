<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'member', // ⬅️ Ini penting!
    ]);

    auth()->login($user); // Langsung login jika ingin

    return redirect('/'); // atau ke halaman lain sesuai kebutuhan
};

