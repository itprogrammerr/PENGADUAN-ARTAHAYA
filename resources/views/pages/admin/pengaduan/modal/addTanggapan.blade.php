<div x-data="{ 'insertModal': localStorage.getItem('insertModal') === 'true' ? true : false }" @keydown.escape="insertModal = false; localStorage.setItem('insertModal', false)" x-cloak>
    <button @click="insertModal = true"
        class="flex items-center px-4 py-2 sm:px-6 sm:py-3 md:px-8 md:py-4 lg:px-10 lg:py-5 xl:px-12 xl:py-6 font-medium text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <p class="hidden md:block ">
            Berikan Tanggapan
        </p>
    </button>


    {{-- //DONE tampilan popup tambah tanggapan belum full + tambah gambar di tanggapan + jika ada tanggapan kirim via email  --}}


    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show.transition="insertModal">
        <div class="!w-3/4 px-6 py-4 mx-auto text-left bg-white dark:bg-gray-800 rounded shadow-lg"
            @click.away="insertModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            style="width: 75%">

            <div class="flex items-center justify-between">
                <h5 class="mr-3
                text-gray-700 dark:text-gray-400 max-w-none">
                    Tambah Data</h5>
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
                <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                    Tanggapan
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
                <form action="{{ route('tanggapan.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pengaduan_id" value="{{ $item->id }} ">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tanggapan</span>
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="8" type="text" placeholder="Isi Tanggapan Anda" name="tanggapan"></textarea>
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Status</span>

                            <select
                                class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="status">
                                <option value="0">Belum di Proses</option>
                                <option value="1">Sedang di Proses</option>
                                <option value="2">Selesai</option>

                            </select>
                        </label>

                        <label for="image" class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Foto (jika diperlukan) :</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" name="image" />
                        </label>


                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tanggapi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
