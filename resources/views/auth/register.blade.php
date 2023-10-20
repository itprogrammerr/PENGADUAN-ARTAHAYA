<x-guest-layout>
    <div class="mb-3">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <img src="{{ asset('assets/img/logo-pengaduan.png') }}" alt=""
                        class="transform transition hover:scale-125 duration-300 ease-in-out"
                        style="max-width: 40%; height:auto; margin: 0 auto;" />
                </a>
            </x-slot>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-label for="nik" :value="__('NIK')" />
                    {{-- <x-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')"
                        required autofocus /> --}}
                    <input type="text" pattern="^-?\d+\.?\d*$"
                        oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16)"
                        class="block mt-1 w-full" name="nik" placeholder="" required autofocus>
                </div>
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="phone" :value="__('No. HP')" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Sudah mendaftar ?') }}
                    </a>
                    <x-button
                        class="ml-3 bg-blue-500 text-white font-bold rounded-md my-3 py-3 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-500 hover:scale-105 duration-300 ease-in-out">
                        {{ __('Daftar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>
