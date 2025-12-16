<!-- component -->
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-blue-600">
            Loading.....
        </div>

        <!-- Sidebar -->
        <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen"
            class="fixed inset-y-0 z-10 flex w-80">
            <!-- Curvy shape -->
            <svg class="absolute inset-0 w-full h-full text-white" style="filter: drop-shadow(10px 0 10px #00000030)"
                preserveAspectRatio="none" viewBox="0 0 309 800" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M268.487 0H0V800H247.32C207.957 725 207.975 492.294 268.487 367.647C329 243 314.906 53.4314 268.487 0Z" />
            </svg>
            <!-- Sidebar content -->
            <div class="z-10 flex flex-col flex-1">
                <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
                    <!-- Logo -->
                    <a href="/">
                        <img src="{{ asset('Image/Logo/logo-smk.png') }}" class="w-40 h-full" alt="">
                    </a>
                    <!-- Close btn -->
                    <button @click="isSidebarOpen = false" class="p-1 rounded-lg focus:outline-none focus:ring">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Close sidebar</span>
                    </button>
                </div>
                <nav class="flex flex-col flex-1 w-64 p-4 mt-4">
                    {{-- home --}}
                    <a href="{{ route('/') }}" class="flex items-center space-x-2 hover:text-blue-600">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Home</span>
                    </a>

                    @if (Auth::user()->roles == 'guru' || Auth::user()->roles == 'siswa')
                        {{-- Profile --}}
                        <a href="{{ route('profile') }}" class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/profile.png') }}" class="w-6" alt="">
                            <span>Profile</span>
                        </a>
                    @endif

                    {{-- Jadwal Pelajaran --}}
                    <a href="{{ route('jadwal-mapel') }}" class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                        <img src="{{ asset('Image/Icon/schedule.png') }}" class="w-6" alt="">
                        <span>Jadwal Pelajaran</span>
                    </a>

                    @if (Auth::user()->roles == 'admin')
                        {{-- Data Guru --}}
                        <a href="{{ route('data-guru') }}" class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/school.png') }}" class="w-6" alt="">
                            <span>Data Guru</span>
                        </a>

                        {{-- Data Siswa --}}
                        <a href="{{ route('data-siswa') }}"
                            class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/study.png') }}" class="w-6" alt="">
                            <span>Data Siswa</span>
                        </a>

                        {{-- Data Walikelas --}}
                        <a href="{{ route('data-walikelas') }}"
                            class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/school.png') }}" class="w-6" alt="">
                            <span>Data Walikelas</span>
                        </a>

                        {{-- Mapel --}}
                        <a href="{{ route('mapel') }}" class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/books.png') }}" class="w-6" alt="">
                            <span>Mata Pelajaran</span>
                        </a>
                    @endif

                    @if (Auth::user()->roles == 'guru' || Auth::user()->roles == 'siswa')
                        {{-- E-Learning --}}
                        <a href="{{ route('elearning') }}"
                            class="flex items-center space-x-2 mt-3 hover:text-blue-600">
                            <img src="{{ asset('Image/Icon/elearning.png') }}" class="w-6" alt="">
                            <span>E-Learning</span>
                        </a>
                    @endif

                    <a href="#" class="flex items-center space-x-2 mt-3 hover:text-blue-600" target="_blank">
                        <img src="{{ asset('Image/Icon/info.png') }}" class="w-6" alt="">
                        <span>Tentang Sekolah</span>
                    </a>
                </nav>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                        class="block w-56 ps-3 pe-4 py-2 border-l-4 border-transparent
                            text-start text-base font-medium text-black hover:border-sky-300 dark:hover:border-sky-600
                            focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:border-gray-300
                            dark:focus:border-gray-600 transition duration-150 ease-in-out">
                        <div class="flex items-center space-x-2">
                            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>{{ __('Log Out') }}</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <main class="flex flex-col flex-1">
            <!-- Page content -->
            <button @click="isSidebarOpen = true" class="fixed p-2 text-white bg-black rounded-lg top-5 left-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="sr-only">Open menu</span>
            </button>
            <h1 class="sr-only">Home</h1>
            <div class="pt-20 px-5 md:px-18 h-full bg-white">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script>
<script>
    const setup = () => {
        return {
            isSidebarOpen: false,
        }
    }
</script>
