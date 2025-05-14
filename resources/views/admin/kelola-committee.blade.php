<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tim Panitia</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
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

        td a {
            padding: 0.5rem 1rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        td a:hover {
            background-color: #003580;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            background-color: #004AAD;
            color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background-color: #003580;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Kelola Tim Panitia</h1>
            <p>Kelola data tim panitia kegiatan di bawah ini.</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committeeUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
