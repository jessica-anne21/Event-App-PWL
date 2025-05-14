<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function kelolaFinance()
    {
        // Mengambil semua pengguna dengan role finance
        $financeUsers = User::where('role', 'finance')->get();

        return view('admin.kelola-finance', compact('financeUsers'));
    }

    public function kelolaCommittee()
    {
        // Mengambil semua pengguna dengan role committee
        $committeeUsers = User::where('role', 'committee')->get();

        return view('admin.kelola-committee', compact('committeeUsers'));
    }
}
