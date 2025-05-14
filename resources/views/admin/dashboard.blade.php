<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #004AAD;
        }

        .header p {
            color: #6b7280;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: #fff;
            padding: 1.5rem;
            border-left: 5px solid #004AAD;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card h2 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #004AAD;
            margin-bottom: 0.5rem;
        }

        .card p {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .card a {
            margin-top: 1rem;
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            text-align: center;
            transition: background 0.2s ease;
        }

        .card a:hover {
            background-color: #003580;
        }

        /* Tombol logout di atas kanan */
        .logout-btn {
            position: absolute;
            top: 1rem;
            right: 2rem;
            padding: 0.5rem 1rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            text-align: center;
            transition: background 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #003580;
        }

        .logout-container {
            position: relative;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Tombol Logout berada di atas kanan -->
        <div class="logout-container">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="header">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang {{ Auth::user()->name }}, kelola pengguna dan event di sistem ini.</p>
        </div>

        <div class="grid">
            <div class="card">
                <div>
                    <h2>Tim Keuangan</h2>
                    <p>Kelola data tim keuangan</p>
                </div>
                  <a href="{{ route('kelola.finance') }}" class="btn">Kelola</a>
            </div>

            <div class="card">
                <div>
                    <h2>Panitia Kegiatan</h2>
                    <p>Kelola data panitia pelaksana</p>
                </div>
                <a href="{{ route('kelola.committee') }}" class="btn">Kelola</a>
            </div>

        </div>
    </div>

</body>
</html>
