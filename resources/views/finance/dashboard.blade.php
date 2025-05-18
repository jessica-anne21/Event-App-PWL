<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Finance</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* -- gaya yang sama seperti file asalmu, dipotong singkat -- */
        body{margin:0;font-family:'Inter',sans-serif;background:#f3f4f6;color:#1f2937}
        .container{max-width:1200px;margin:auto;padding:2rem}
        .header{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem}
        h1{font-size:2rem;font-weight:700;color:#004AAD;margin:0}
        .logout-btn{padding:.5rem 1rem;background:#004AAD;color:#fff;border-radius:.5rem;border:none;cursor:pointer}
        .logout-btn:hover{background:#003580}
        table{width:100%;border-collapse:collapse}
        th,td{padding:1rem;border:1px solid #ccc}
        th{background:#004AAD;color:#fff}
        .btn{padding:.5rem 1rem;background:#004AAD;color:#fff;border-radius:.5rem;text-decoration:none;cursor:pointer;border:none}
        .btn:hover{background:#003580}
        .badge{padding:.25rem .75rem;border-radius:.5rem;font-size:.75rem;color:#fff}
        .pending{background:#f59e0b}.approved{background:#16a34a}.rejected{background:#dc2626}
    </style>
</head>
<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Dashboard Finance</h1>
            <p>Selamat datang {{ Auth::user()->name }}, kelola pembayaran peserta event di sini.</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">@csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>

    @if(session('success'))
        <p style="color:#16a34a;font-weight:600">{{ session('success') }}</p>
    @endif

    <h2>Daftar Pembayaran Masuk</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Peserta</th>
                <th>Event</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($registrations as $reg)
            <tr>
                <td>{{ $reg->user->name }}</td>
                <td>{{ $reg->event->name }}</td>
                <td>
                    <span class="badge {{ $reg->payment_status }}">
                        {{ ucfirst($reg->payment_status) }}
                    </span>
                </td>
                <td>
                    @if($reg->payment_proof)
                        <a href="{{ asset('storage/'.$reg->payment_proof) }}"
                           target="_blank" class="btn">Lihat</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($reg->payment_status === 'pending')
                        <!-- Approve -->
                        <form action="{{ route('finance.verify', $reg) }}"
                              method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="action" value="approved">
                            <button class="btn" onclick="return confirm('Setujui pembayaran?')">Approve</button>
                        </form>
                        <!-- Reject -->
                        <form action="{{ route('finance.verify', $reg) }}"
                              method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="action" value="rejected">
                            <button class="btn" style="background:#dc2626"
                                    onclick="return confirm('Tolak pembayaran?')">Reject</button>
                        </form>
                    @else
                        —
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="5" style="text-align:center">Belum ada pembayaran.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
