<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */


public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (! Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    $request->session()->regenerate();

    // Redirect based on role
    $user = Auth::user();
    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'finance':
            return redirect()->route('finance.dashboard');
        case 'committee':
            return redirect()->route('committee.dashboard');
        case 'guest':
            return redirect()->route('welcome');
        default: // member
            return redirect('/');
    }
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
