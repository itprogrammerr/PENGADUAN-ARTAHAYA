<x-guest-layout>
    <div class="">
        <x-auth-card
            style=" max-width: 400px;
    padding: 1.5rem;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <x-slot name="logo">
                <a href="/" class="flex items-end">
                    <img src="{{ asset('assets/img/logo-pengaduan.png') }}" alt=""
                        class="transform transition hover:scale-125 duration-300 ease-in-out"
                        style="max-width: 40%; height:auto; margin: 0 auto;" />
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="mt-6">

                @csrf

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <div>
                        Belum punya akun? <a class="text-blue-500 hover:underline" href="{{ url('register') }}">Daftar
                            disini</a>
                    </div>
                    <div>
                        <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    </div>
                </div>

                <div class="flex flex-row mt-4 justify-end">
                    <button
                        class="block py-2 pl-3 pr-4 mt-2 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent focus:outline-none">
                        <a href="{{ url('/') }}" style="font-weight: bold;">Kembali</a>
                    </button>
                    <x-button
                        class="ml-3  bg-blue-500 text-white font-bold rounded-md my-3 py-3 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-500 hover:scale-105 duration-300 ease-in-out">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>

        </x-auth-card>
    </div>
</x-guest-layout>
