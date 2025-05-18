<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JesJon University Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Inter', sans-serif; margin: 0; padding: 0; }
        body { background-color: #f9f9f9; padding: 40px; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .logo { display: flex; align-items: center; gap: 10px; }
        .logo img { width: 40px; }
        nav a, nav form button { margin: 0 10px; text-decoration: none; color: #333; font-weight: 500; background: none; border: none; cursor: pointer; font-family: inherit; }
        .btn-register { background-color: #004AAD; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: 600; }
        .hero { background: linear-gradient(135deg, #004AAD, #1667C1); color: white; border-radius: 16px; padding: 60px; text-align: center; margin-bottom: 50px; }
        .hero h2 { font-size: 20px; margin-bottom: 10px; }
        .hero h1 { font-size: 48px; font-weight: 700; }
        .section-title { font-size: 28px; font-weight: 700; margin-bottom: 30px; }
        .event-list { display: flex; flex-direction: column; gap: 20px; }
        .event-card { display: flex; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .event-card img { width: 120px; object-fit: cover; }
        .event-info { padding: 20px; flex: 1; }
        .event-info h3 { font-size: 18px; margin-bottom: 5px; }
        .event-info p { color: #666; margin-bottom: 10px; }
        .event-info a { background-color: #004AAD; color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: 600; }
        .modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); justify-content: center; align-items: center; z-index: 50; }
        .modal-content { background: #fff; padding: 20px; border-radius: 10px; width: 90%; max-width: 500px; }
        .status-message { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
    </style>
</head>
<body>

@if(session('status'))
    <div class="status-message">{{ session('status') }}</div>
@endif

<header>
    <div class="logo">
        <img src="https://img.icons8.com/ios-filled/50/000000/university.png" alt="Logo">
        <strong>JesJon University</strong>
    </div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Events</a>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-register bg-red-600 hover:bg-red-700">Logout</button>
            </form>
        @else
            <a class="btn-register" href="{{ route('login') }}">Login</a>
            <a class="btn-register" href="{{ route('register') }}">Daftar</a>
        @endauth
    </nav>
</header>

<section class="hero">
    <h2>JOIN US FOR</h2>
    <h1>CONFERENCE 2025</h1>
</section>

<section>
    <h2 class="section-title">Daftar Event Terbaru</h2>
    <div class="event-list">
        @if($events->isEmpty())
    <p>Belum Ada Event</p>
@else
    @foreach($events as $event)
    <div class="event-card">
        <img src="https://via.placeholder.com/120x100/004AAD/ffffff?text={{ urlencode($event->name) }}" alt="{{ $event->name }}">
        <div class="event-info">
            <h3>{{ $event->name }}</h3>
            <p>{{ \Carbon\Carbon::parse($event->main_event_datetime)->format('d M Y H:i') }}</p>
            <a href="javascript:void(0)" 
               onclick="openModal({{ json_encode($event) }})">Detail & Registrasi</a>
        </div>
    </div>
@endforeach

@endif

    </div>
</section>

<!-- Modal -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <h3 id="modalTitle" class="text-xl font-bold mb-4 text-[#004AAD]">Judul Event</h3>
        <p class="mb-4">Deskripsi lengkap event akan ditampilkan di sini...</p>

        @auth
        <form action="/bayar" method="POST">
            @csrf
            <input type="hidden" name="event" id="eventInput">
            <button type="submit" class="bg-[#004AAD] text-white px-4 py-2 rounded hover:bg-blue-800 w-full">
                Bayar Sekarang
            </button>
        </form>
        @else
        <p class="text-sm text-gray-600 text-center mb-2">Silakan login untuk melanjutkan pembayaran.</p>
        <div class="flex gap-2 justify-center">
            <a href="{{ route('login') }}" class="text-[#004AAD] font-medium hover:underline">Login</a>
            <span>|</span>
            <a href="{{ route('register') }}" class="text-[#004AAD] font-medium hover:underline">Daftar</a>
        </div>
        @endauth

        <button onclick="closeModal()" class="mt-4 w-full text-center text-sm text-gray-500 hover:underline">Tutup</button>
    </div>
</div>

<script>
    function openModal(event) {
    document.getElementById('modalTitle').innerText = event.name;

    // Isi deskripsi lengkap, contoh:
    const modalContent = document.querySelector('.modal-content p');
    modalContent.innerHTML = `
        <strong>Deskripsi:</strong> ${event.description}<br>
        <strong>Waktu Utama:</strong> ${new Date(event.main_event_datetime).toLocaleString()}<br>
        <strong>Lokasi:</strong> ${event.location}<br>
        <strong>Speaker:</strong> ${event.speaker}<br>
        <strong>Biaya:</strong> Rp ${event.fee.toLocaleString()}<br>
        <strong>Kuota:</strong> ${event.quota}
    `;

    // Pasang nama event ke input hidden form pembayaran
    document.getElementById('eventInput').value = event.name;

    document.getElementById('eventModal').style.display = 'flex';
}

</script>

</body>
</html>
