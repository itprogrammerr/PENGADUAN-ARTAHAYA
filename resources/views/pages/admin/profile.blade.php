@extends('layouts.admin')
@section('css')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 1rem;
        }

        .grid-item {
            padding: 1rem;
            text-align: start;
        }
    </style>
@endsection
@section('title')
    Profile
@endsection
@section('content')
    <main class="h-full pb-16 overflow-y-auto p-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Profile
        </h2>
        <form action="{{ route('adminprofile.update', [$data->id]) }}" method="post" class="max-w-md mx-auto mt-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4 mr-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIK:</label>
                    <input type="number" name="nik" id="nik" value="{{ $data->nik }}"
                        class="mt-1 p-2 border rounded-md w-full" placeholder="Masukkan NIK (maksimal 16 digit)">
                </div>
                <div class="mb-4 mr-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama:</label>
                    <input type="text" name="name" id="name" value="{{ $data->name }}"
                        class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4 mr-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail:</label>
                    <input type="email" name="email" id="email" value="{{ $data->email }}"
                        class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4 mr-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone:</label>
                    <input type="number" name="phone" id="phone" value="{{ $data->phone }}"
                        class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4 mr-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password:</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="mt-1 p-2 border rounded-md w-full pr-10">
                        <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center focus:outline-none"
                            onclick="togglePasswordVisibility('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Submit</button>
        </form>
    </main>
@endsection
@section('js')
    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
@endsection
