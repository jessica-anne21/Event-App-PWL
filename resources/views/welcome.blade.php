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

        .modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-content {
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.btn-pay {
    background: linear-gradient(to right, #004AAD, #1667C1);
    color: white;
    font-weight: 600;
    padding: 12px;
    border-radius: 10px;
    border: none;
    width: 100%;
    margin-top: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
}

.btn-pay:hover {
    background: #00388a;
    transform: scale(1.02);
}

.btn-close {
    margin-top: 20px;
    background: transparent;
    color: #666;
    border: none;
    font-size: 14px;
    width: 100%;
    cursor: pointer;
    transition: color 0.2s ease;
}

.btn-close:hover {
    color: #004AAD;
}

.btn-auth-link {
    background: #004AAD;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s ease;
}

.btn-auth-link:hover {
    background: #00357e;
}

.bg-yellow-100 {
    background-color: #FEF9C3;
}
.border-yellow-500 {
    border-color: #F59E0B;
}
.text-yellow-800 {
    color: #92400E;
}


        
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
        <a href="{{ route('my_orders') }}">My Orders</a>

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
        <img src="" alt="{{ $event->name }}">
        <div class="event-info">
            <h3>{{ $event->name }}</h3>
            <p>{{ \Carbon\Carbon::parse($event->main_event_datetime)->format('d M Y H:i') }}</p>
            <a href="javascript:void(0)" 
   class="btn-detail"
   data-event='@json($event)'>
   Detail & Registrasi
</a>


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
        
        <div class="modal-body mb-4 text-sm text-gray-700">
            <p>Deskripsi lengkap event akan ditampilkan di sini...</p>
        </div>

        @auth
        <!-- Jika user sudah login -->
        <form action="/bayar" method="POST">
            @csrf
            <input type="hidden" name="event" id="eventInput">
            <button type="submit" class="btn-pay">💳 Bayar Sekarang</button>
        </form>
        @else
        <!-- Jika user belum login -->
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 text-sm rounded mb-4">
            <p><strong><a href='/login'>Login</strong></a> atau <strong><a href='/register'>Daftar</strong></a> untuk melakukan pembayaran.</p>
        </div>
        
        @endauth

        <button onclick="closeModal()" class="btn-close">Tutup ✖</button>
    </div>
</div>



    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.btn-detail');
        const modal = document.getElementById('eventModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.querySelector('.modal-body');
        const eventInput = document.getElementById('eventInput');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const event = JSON.parse(btn.dataset.event);
                modalTitle.textContent = event.name;
                modalBody.innerHTML = `
                    <strong>Deskripsi:</strong> ${event.description}<br>
                    <strong>Waktu Utama:</strong> ${new Date(event.main_event_datetime).toLocaleString()}<br>
                    <strong>Lokasi:</strong> ${event.location}<br>
                    <strong>Speaker:</strong> ${event.speaker}<br>
                    <strong>Biaya:</strong> Rp ${Number(event.fee).toLocaleString()}<br>
                    <strong>Kuota:</strong> ${event.quota}
                `;
                if (eventInput) {
                    eventInput.value = event.name;
                }
                modal.style.display = 'flex';
            });
        });
    });

    function closeModal() {
        document.getElementById('eventModal').style.display = 'none';
    }
</script>



</body>
</html>
