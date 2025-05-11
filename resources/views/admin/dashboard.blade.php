@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-[#004AAD]">Dashboard Admin</h1>
            <p class="text-gray-600 mt-2">Selamat datang, {{ Auth::user()->name }}! Kelola pengguna dan event di sistem ini.</p>
        </div>

        <!-- CARD SECTION -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <!-- Tim Keuangan -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-[#004AAD]">
                <h2 class="text-lg font-semibold text-[#004AAD]">Tim Keuangan</h2>
                <p class="text-sm text-gray-600">Kelola data tim keuangan</p>
                <a href="{{ route('admin.keuangan.index') }}" class="inline-block mt-4 text-sm text-white bg-[#004AAD] px-4 py-2 rounded hover:bg-blue-700 transition">Kelola</a>
            </div>

            <!-- Panitia -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-[#004AAD]">
                <h2 class="text-lg font-semibold text-[#004AAD]">Panitia Kegiatan</h2>
                <p class="text-sm text-gray-600">Kelola data panitia pelaksana</p>
                <a href="{{ route('admin.panitia.index') }}" class="inline-block mt-4 text-sm text-white bg-[#004AAD] px-4 py-2 rounded hover:bg-blue-700 transition">Kelola</a>
            </div>

            <!-- Event -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-[#004AAD]">
                <h2 class="text-lg font-semibold text-[#004AAD]">Event</h2>
                <p class="text-sm text-gray-600">Lihat seluruh data event</p>
                <a href="{{ route('admin.event.index') }}" class="inline-block mt-4 text-sm text-white bg-[#004AAD] px-4 py-2 rounded hover:bg-blue-700 transition">Kelola</a>
            </div>

            <!-- Pengguna -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-[#004AAD]">
                <h2 class="text-lg font-semibold text-[#004AAD]">Pengguna</h2>
                <p class="text-sm text-gray-600">Kelola akun member</p>
                <a href="{{ route('admin.users.index') }}" class="inline-block mt-4 text-sm text-white bg-[#004AAD] px-4 py-2 rounded hover:bg-blue-700 transition">Kelola</a>
            </div>
        </div>
    </div>
</div>
@endsection
