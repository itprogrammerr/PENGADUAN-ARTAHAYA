{{-- edit --}}
<div x-data="{ 'updateModal': false }" @keydown.escape="updateModal = false" x-cloak class="mr-2">
    <button type="button" @click="updateModal = true">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="#9e9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
            </path>
            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
        </svg>
    </button>

    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show.transition="updateModal">
        <div class="w-[100%] max-w-full px-6 py-4 mx-auto text-left bg-white dark:bg-gray-800 rounded shadow-lg"
            @click.away="updateModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <div class="flex items-center justify-between ">
                <h5 class="mr-3 text-gray-700 dark:text-gray-400 max-w-none">
                    Edit Data</h5>
                <button type="button" class="z-50 cursor-pointer" @click="updateModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div>
                <form action="{{ route('pengaduan.update', [$item->id]) }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Laporan</span>
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="8" type="text" placeholder="Isi laporan Anda" value="{{ old('description') }}" name="description">{{ $item->description }}</textarea>
                        </label>

                        <label for="image" class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Wajib
                                Melampirkan Foto Bukti</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="file" value="{{ old('image') }}" name="image" />
                        </label>
                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
