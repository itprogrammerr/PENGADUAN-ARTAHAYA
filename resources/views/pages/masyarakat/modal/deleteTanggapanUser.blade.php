{{-- delete --}}
<div x-data="{ 'deleteModal': false }" @keydown.escape="deleteModal = false" x-cloak class="mr-2">
    <button type="submit" @click="deleteModal=true">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="#f70000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
            </path>
            <line x1="10" y1="11" x2="10" y2="17">
            </line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg>
    </button>

    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show.transition="deleteModal">
        <div class="w-[100%] max-w-full px-6 py-4 mx-auto text-left bg-white dark:bg-gray-800 rounded shadow-lg"
            @click.away="deleteModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <div class="flex items-center justify-between ">
                <h5 class="mr-3 text-gray-700 dark:text-gray-400 max-w-none">
                    Hapus Data</h5>
                <button type="button" class="z-50 cursor-pointer" @click="deleteModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div>
                <form action="{{ route('usertanggapan.destroy', [$t->id]) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                WARNING !! Data yang dihapus tidak dapat
                                dipulihkan !
                            </span>
                        </label>

                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
