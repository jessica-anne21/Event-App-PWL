<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Finance</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #004AAD;
        }

        .header p {
            color: #6b7280;
        }

        .logout-btn {
            padding: 0.5rem 1rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #003580;
        }

        .greeting {
            font-size: 1rem;
            font-weight: 600;
            color: #6b7280;
        }

        .table-container {
            margin-top: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #004AAD;
            color: white;
        }

        .btn {
            padding: 0.5rem 1rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #003580;
        }

        .form-container {
            margin-top: 2rem;
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .form-container label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
        }

        .form-container button {
            padding: 0.75rem 1.5rem;
            background-color: #004AAD;
            color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #003580;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <div>
                <h1>Dashboard Finance</h1>
                <p>Selamat datang {{ Auth::user()->name }}, kelola pembayaran peserta event di sini.</p>
            </div>
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="table-container">
            <h2>Daftar Peserta yang Telah Melakukan Pembayaran</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nama Peserta</th>
                        <th>Event</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>
                            <a href="#" class="btn">Lihat Bukti</a>
                        </td>
                        <td>
                            <a href="#" class="btn" data-toggle="modal">Verifikasi</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
