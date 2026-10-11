<!-- Academic Portal Layout & Navigation -->
<div x-data="{ isSidebarOpen: false }" class="min-h-screen bg-slate-50">

    <!-- Desktop Sidebar (Permanently fixed and visible on desktop screens lg: 1024px+, NO transform, NO hiding) -->
    <aside class="hidden lg:flex lg:flex-col lg:w-72 lg:fixed lg:inset-y-0 lg:left-0 z-40 bg-slate-900 text-slate-100 border-r border-slate-800 shadow-xl">
        <x-sidebar-nav />
    </aside>

    <!-- Mobile Offcanvas Sidebar Drawer (Only on screens < lg) -->
    <div x-show="isSidebarOpen" 
         class="relative z-50 lg:hidden" 
         role="dialog" 
         aria-modal="true"
         x-cloak>
        <!-- Mobile Backdrop with smooth fade -->
        <div x-show="isSidebarOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="isSidebarOpen = false"
             class="fixed inset-0 bg-slate-950/75 backdrop-blur-xs"></div>

        <!-- Slide-over Drawer Panel -->
        <div class="fixed inset-0 flex">
            <div x-show="isSidebarOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative flex w-full max-w-xs flex-1 flex-col bg-slate-900 text-slate-100 border-r border-slate-800 shadow-2xl">
                 
                 <!-- Close Button -->
                 <div class="absolute top-4 right-3 z-10">
                     <button @click="isSidebarOpen = false" 
                             type="button"
                             class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/80 transition cursor-pointer">
                         <span class="sr-only">Tutup menu</span>
                         <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                         </svg>
                     </button>
                 </div>

                 <x-sidebar-nav />
            </div>
            <div class="w-14 shrink-0" aria-hidden="true"></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="lg:pl-72 flex flex-col min-h-screen">
        <!-- Top Navbar -->
        <header class="sticky top-0 z-30 h-16 bg-white/95 backdrop-blur-md border-b border-slate-200/80 flex items-center justify-between px-4 sm:px-6 lg:px-8 shadow-xs">
            <div class="flex items-center space-x-3">
                <!-- Hamburger Button (Mobile / Tablet < lg) -->
                <button @click="isSidebarOpen = true" 
                        type="button"
                        class="lg:hidden inline-flex items-center space-x-2 px-3 py-1.5 rounded-xl text-slate-700 hover:text-indigo-600 hover:bg-slate-100 border border-slate-200 shadow-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition cursor-pointer">
                    <svg class="w-5 h-5 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-wider">Menu</span>
                </button>

                <!-- Academic Semester Indicator -->
                <div class="flex items-center space-x-2 px-3 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>T.A. 2024/2025 • Semester Ganjil</span>
                </div>
            </div>

            <!-- Right Navbar Utilities -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-slate-800 leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-slate-500 capitalize leading-tight">
                        @if(Auth::user()->roles == 'admin') Administrator
                        @elseif(Auth::user()->roles == 'guru') Guru Pengajar
                        @elseif(Auth::user()->roles == 'siswa') Siswa
                        @else {{ Auth::user()->roles }}
                        @endif
                    </p>
                </div>

                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 to-blue-500 text-white font-bold text-sm flex items-center justify-center shadow-sm">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- Main View Slot -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
            {{ $slot }}
        </main>
    </div>
</div>
