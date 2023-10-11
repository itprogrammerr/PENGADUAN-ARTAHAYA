<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-end h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        <button id="mobile-menu-toggle"
            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <nav id="mobile-menu" class="hidden md:hidden">
            <!-- Isi menu -->
            <a href="{{ url('user') }}"
                class="inline-flex items-center text-sm mr-5 font-semibold transition-colors duration-150">
                <span class="ml-4">Dashboard</span>
            </a>

            <a href="{{ url('user/pengaduan') }}"
                class="inline-flex items-center text-sm mr-5 font-semibold transition-colors duration-150">
                <span class="ml-4">Pengaduan</span>
            </a>
        </nav>

        <ul class="flex items-center flex-shrink-2 space-x-6 hidden-mobile">
            <!-- Tombol tema dan informasi pengguna lainnya -->
        </ul>
    </div>
</header>

<script>
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
