<div x-data="{ 'insertModal': localStorage.getItem('insertModal') === 'true' ? true : false }" @keydown.escape="insertModal = false; localStorage.setItem('insertModal', false)" x-cloak>
    <button type="button" @click="insertModal=true">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
            </path>
            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
        </svg>
    </button>

    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show.transition="insertModal">
        <div class="!w-3/4 px-6 py-4 mx-auto text-left bg-white dark:bg-gray-800 rounded shadow-lg"
            @click.away="insertModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            style="width: 75%">

            <div class="flex items-center justify-between">
                <h5 class="mr-3
                text-gray-700 dark:text-gray-400 max-w-none">
                    Edit Data</h5>
                <button type="button" class="z-50 cursor-pointer"
                    @click="insertModal = false; localStorage.setItem('insertModal', false)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d=" M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="container px-6 mx-auto grid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('adminprofile.update', [$petugas->id]) }}" method="post"
                    class="max-w-md mx-auto mt-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4 mr-4">
                            <label for="nik"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIK:</label>
                            <input type="number" name="nik" id="nik" value="{{ $petugas->nik }}"
                                class="mt-1 p-2 border rounded-md w-full"
                                placeholder="Masukkan NIK (maksimal 16 digit)">
                        </div>
                        <div class="mb-4 mr-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama:</label>
                            <input type="text" name="name" id="name" value="{{ $petugas->name }}"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4 mr-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail:</label>
                            <input type="email" name="email" id="email" value="{{ $petugas->email }}"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4 mr-4">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone:</label>
                            <input type="number" name="phone" id="phone" value="{{ $petugas->phone }}"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4 mr-4">
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password:</label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="mt-1 p-2 border rounded-md w-full pr-10">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 px-3 flex items-center focus:outline-none"
                                    onclick="togglePasswordVisibility('password')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
