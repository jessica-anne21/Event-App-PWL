<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran - {{ $event->name }}</title>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f0f4f8; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 16px; max-width: 600px; margin: auto; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        h2 { color: #004AAD; margin-bottom: 20px; }
        p { margin: 8px 0; }
        label { font-weight: 600; }
        input[type="text"] { padding: 10px; width: 100%; margin-top: 5px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 20px; }
        button { background: #004AAD; color: white; padding: 12px 20px; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: 0.3s; }
        button:hover { background: #00357e; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pembayaran Event: {{ $event->name }}</h2>
        <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($event->main_event_datetime)->format('d M Y H:i') }}</p>
        <p><strong>Lokasi:</strong> {{ $event->location }}</p>
        <p><strong>Speaker:</strong> {{ $event->speaker }}</p>
        <p><strong>Biaya:</strong> Rp {{ number_format($event->fee, 0, ',', '.') }}</p>

        <form action="{{ route('bayar.proses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_id" value="{{ $event->id }}">

    <label for="payment_method">Metode Pembayaran</label>
    <input type="text" id="payment_method" name="payment_method" required>

    <label for="payment_amount">Nominal Pembayaran</label>
    <input type="number" id="payment_amount" name="payment_amount" required>


    <label for="payment_proof">Upload Bukti Pembayaran</label>
    <input type="file" id="payment_proof" name="payment_proof" accept="image/*" required>

    <button type="submit">Konfirmasi & Bayar</button>
</form>

    </div>
</body>
</html>
