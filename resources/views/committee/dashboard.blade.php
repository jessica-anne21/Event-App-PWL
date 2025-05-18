<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Committee</title>
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

        .event-container, .scan-container, .upload-container {
            margin-top: 2rem;
        }

        .event-container h2,
        .scan-container h2,
        .upload-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .event-details, .scan-form, .upload-form {
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .event-details label,
        .scan-form label,
        .upload-form label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .event-details input,
        .scan-form input,
        .upload-form input,
        .upload-form textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
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
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <div>
                <h1>Dashboard Committee</h1>
                <p>Selamat datang {{ Auth::user()->name }}, kelola event dan peserta kegiatan di sini.</p>
            </div>
 
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <!-- Event Details Section -->
        <div class="event-container">
            <h2>Data Event</h2>
            <div class="event-details">
                @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="event-name">Nama Event</label>
                    <input type="text" id="event-name" name="name" placeholder="Seminar Teknologi" required>

                    <label for="event-date">Tanggal & Waktu Main Event</label>
                    <input type="datetime-local" id="event-date" name="main_event_datetime" required>

                    <label for="sub-event-date">Tanggal & Waktu Sub Event</label>
                    <input type="datetime-local" id="sub-event-date" name="sub_event_datetime">

                    <label for="event-location">Lokasi</label>
                    <input type="text" id="event-location" name="location" placeholder="Gedung Serba Guna, Kota X" required>

                    <label for="event-speaker">Narasumber</label>
                    <input type="text" id="event-speaker" name="speaker" placeholder="Dr. Jane Doe">

                    <label for="description">Deskripsi Event</label>
                    <input type="text" id="description" name="description" placeholder="Seminar ini adalah...">


                    <label for="event-poster">Poster Event</label>
                    <input type="file" id="event-poster" name="poster">

                    <label for="event-fee">Biaya Registrasi</label>
                    <input type="number" id="event-fee" name="fee" placeholder="100000" required>

                    <label for="quota">Jumlah Maksimal Peserta</label>
                    <input type="number" id="quota" name="quota" placeholder="200" required>

                    <button type="submit" class="btn">Tambah Event</button>
                </form>
            </div>


        </div>

    </div>

</body>
</html>
