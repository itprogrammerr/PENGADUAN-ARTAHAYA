<div x-data="{ 'insertModal': localStorage.getItem('insertModal') === 'true' ? true : false }" @keydown.escape="insertModal = false; localStorage.setItem('insertModal', false)" x-cloak
    class="mr-2">
    <h4 class="mt-6 mb-6 text-gray-700 dark:text-gray-200">
        <button
            class="flex items-center space-x-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
            type="button" @click="insertModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#9e9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            <span>Tambah Data</span>
        </button>
    </h4>

    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show.transition="insertModal">
        <div class="w-[100%] max-w-full px-6 py-4 mx-auto text-left bg-white dark:bg-gray-800 rounded shadow-lg"
            @click.away="insertModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <div class="flex items-center justify-between ">
                <h5 class="mr-3 text-gray-700 dark:text-gray-400 max-w-none">
                    Tambah Data</h5>
                <button type="button" class="z-50 cursor-pointer"
                    @click="insertModal = false; localStorage.setItem('insertModal', false)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#cccccc">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                    Silahkan ajukan pengaduan Anda!
                </h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pengaduan.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Laporan</span>
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="8" type="text" placeholder="Isi laporan Anda" value="{{ old('description') }}" name="description"></textarea>
                        </label>

                        <label for="image" class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Wajib Melampirkan Foto Bukti</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" accept="image/*" value="{{ old('image') }}" name="image" />
                            <span style="font-size: 12px; color: #f20202">
                                type: jpg, jpeg, png || max: 2 MB
                            </span>
                        </label>

                        <div class="flex flex-row justify-end">
                            <button type="button"
                                @click="insertModal = false; localStorage.setItem('insertModal', false)"
                                class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                                Tutup
                            </button>
                            <button type="submit"
                                class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mr-4">
                                Laporkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
