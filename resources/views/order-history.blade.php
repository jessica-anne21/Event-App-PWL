<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemesanan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; color: #1f2937; padding: 2rem; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 1rem; border: 1px solid #ddd; }
        th { background-color: #004AAD; color: white; }
        .badge { padding: 0.25rem 0.75rem; border-radius: 0.5rem; color: white; font-size: 0.8rem; }
        .pending { background: #f59e0b; }
        .approved { background: #16a34a; }
        .rejected { background: #dc2626; }
    </style>
</head>
<body>
    <h1>Riwayat Pemesanan Event</h1>

    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Harga</th>
                <th>Status Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->event->name }}</td>
                    <td>Rp {{ $order->event->fee }}</td>
                    <td><span class="badge {{ $order->payment_status }}">{{ ucfirst($order->payment_status) }}</span></td>
                    <td>
                        @if($order->payment_proof)
                            <a href="{{ asset('storage/'.$order->payment_proof) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada pemesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
