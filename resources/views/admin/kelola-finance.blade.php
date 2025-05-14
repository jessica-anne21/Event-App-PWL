<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tim Keuangan</title>
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

        .add-user-btn {
            padding: 0.75rem 1.5rem;
            background-color: #004AAD;
            color: white;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .add-user-btn:hover {
            background-color: #003580;
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 0.5rem;
            width: 50%;
        }

        .modal-header h2 {
            color: #004AAD;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-container input {
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
            <h1>Kelola Tim Keuangan</h1>
            <button class="add-user-btn" id="openModal">Tambah User</button>
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
                @foreach ($financeUsers as $user)
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

    <!-- Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" id="closeModal">&times;</span>
                <h2>Tambah User</h2>
            </div>
            <form action="{{ route('finance.users.store') }}" method="POST">
                @csrf
                <div class="form-container">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get modal element and buttons
        var modal = document.getElementById("userModal");
        var openModalBtn = document.getElementById("openModal");
        var closeModalBtn = document.getElementById("closeModal");

        // Open the modal
        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Close the modal
        closeModalBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Close the modal if user clicks outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
