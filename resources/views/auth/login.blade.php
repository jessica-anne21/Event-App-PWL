<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JesJon University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center text-[#004AAD] mb-6">Login ke Akun Anda</h2>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-[#004AAD] mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#004AAD] focus:ring-[#004AAD]">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-[#004AAD] mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#004AAD] focus:ring-[#004AAD]">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Button --}}
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-[#004AAD] hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-md transition">
                    Masuk
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-[#004AAD] font-medium hover:underline">Daftar Sekarang</a>
        </p>
    </div>

</body>
</html>
