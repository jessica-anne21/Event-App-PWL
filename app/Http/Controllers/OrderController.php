<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
{
    $orders = auth()->user()->orders; // pastikan relasi orders di model User
    return view('my_orders', compact('orders'));
}

}
