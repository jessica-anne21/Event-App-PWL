<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteeDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('committee.dashboard');
    }
}
