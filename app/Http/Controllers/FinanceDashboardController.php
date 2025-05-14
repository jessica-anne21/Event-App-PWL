<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('finance.dashboard');
    }
}
