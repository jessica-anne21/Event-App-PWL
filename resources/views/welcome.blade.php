<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univers Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #f9f9f9;
            padding: 40px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo img {
            width: 40px;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .btn-register {
            background-color: #004AAD;
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .hero {
            background: linear-gradient(135deg, #004AAD, #1667C1);
            color: white;
            border-radius: 16px;
            padding: 60px;
            text-align: center;
            margin-bottom: 50px;
        }
        .hero h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .hero h1 {
            font-size: 48px;
            font-weight: 700;
        }
        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .event-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .event-card {
            display: flex;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .event-card img {
            width: 120px;
            object-fit: cover;
        }
        .event-info {
            padding: 20px;
            flex: 1;
        }
        .event-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .event-info p {
            color: #666;
            margin-bottom: 10px;
        }
        .event-info a {
            background-color: #004AAD;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="https://img.icons8.com/ios-filled/50/000000/university.png" alt="Logo">
        <strong>JJ University</strong>
    </div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a class="btn-register" href="{{ route('register') }}" style="background-color: #004AAD; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: bold;">Daftar Sekarang</a>
    </nav>
</header>

<section class="hero">
    <h2>JOIN US FOR</h2>
    <h1>CONFERENCE 2025</h1>
</section>

<section>
    <h2 class="section-title">Daftar Event Terbaru</h2>
    <div class="event-list">
        <div class="event-card">
            <img src="https://via.placeholder.com/120x100/004AAD/ffffff?text=AI" alt="Seminar AI">
            <div class="event-info">
                <h3>SEMINAR AI 2025</h3>
                <p>21 Juni 2025</p>
                <a href="#">Detail & Registrasi</a>
            </div>
        </div>
        <div class="event-card">
            <img src="https://via.placeholder.com/120x100/004AAD/ffffff?text=UI%2FUX" alt="Workshop UI/UX">
            <div class="event-info">
                <h3>WORKSHOP UI/UX</h3>
                <p>28 Juni 2025</p>
                <a href="#">Detail & Registrasi</a>
            </div>
        </div>
        <div class="event-card">
            <img src="https://via.placeholder.com/120x100/004AAD/ffffff?text=Bisnis" alt="Kuliah Umum Bisnis">
            <div class="event-info">
                <h3>KULIAH UMUM BISNIS</h3>
                <p>5 Juli 2025</p>
                <a href="#">Detail & Registrasi</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
