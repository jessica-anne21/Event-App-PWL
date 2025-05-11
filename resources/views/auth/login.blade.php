<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-6 py-12">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
            <h2 class="text-2xl font-bold text-center text-[#004AAD] mb-6">Login ke Akun Anda</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-[#004AAD]" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-[#004AAD] focus:ring-[#004AAD]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-[#004AAD]" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-[#004AAD] focus:ring-[#004AAD]" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#004AAD] shadow-sm focus:ring-[#004AAD]" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#004AAD] hover:underline" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <div class="flex justify-end">
                    <x-primary-button class="w-full justify-center bg-[#004AAD] hover:bg-blue-800">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>

            <p class="text-sm text-center text-gray-600 mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-[#004AAD] font-medium hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</x-guest-layout>
