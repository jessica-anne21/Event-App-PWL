<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center text-[#004AAD] mb-6">Buat Akun Baru</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input id="name" name="name" type="text" required autofocus value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#004AAD] focus:border-[#004AAD]">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#004AAD] focus:border-[#004AAD]">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#004AAD] focus:border-[#004AAD]">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#004AAD] focus:border-[#004AAD]">
            </div>

            <!-- Role Selection -->
            <div class="mb-6">
                <label for="role" class="block text-sm font-medium text-gray-700">Daftar Sebagai</label>
                <select id="role" name="role" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#004AAD] focus:border-[#004AAD]">
                    <option value="">-- Pilih Role --</option>
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                    <option value="finance">Finance</option>
                    <option value="committee">Committee</option>
                </select>
            </div> 

            <!-- Submit -->
            <div>
                <button type="submit"
                        class="w-full bg-[#004AAD] text-white font-bold py-2 px-4 rounded-md hover:bg-blue-800">
                    Daftar
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-[#004AAD] font-medium hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
