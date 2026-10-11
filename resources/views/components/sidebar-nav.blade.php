<!-- Reusable Sidebar Navigation Content -->
<div class="flex flex-col h-full overflow-hidden">
    <!-- Institution Branding -->
    <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-slate-950/40 shrink-0">
        <a href="{{ route('/') }}" class="flex items-center space-x-3 group">
            <div class="w-10 h-10 rounded-xl bg-white p-1 flex items-center justify-center shadow-md ring-2 ring-indigo-500/30 group-hover:ring-indigo-400 transition">
                <img src="{{ asset('Image/Logo/logo-smk.png') }}" class="w-full h-full object-contain" alt="Logo SMK">
            </div>
            <div class="flex flex-col">
                <span class="text-base font-bold tracking-tight text-white group-hover:text-indigo-300 transition">SMK E-LEARNING</span>
                <span class="text-[11px] font-medium uppercase tracking-wider text-indigo-400">Portal Akademik</span>
            </div>
        </a>
    </div>

    <!-- User Profile Pill in Sidebar -->
    <div class="p-4 mx-4 my-3 rounded-2xl bg-slate-800/60 border border-slate-750/80 flex items-center space-x-3 shrink-0">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-inner shrink-0">
            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
            <div class="flex items-center mt-0.5 space-x-1.5">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-[11px] font-medium text-slate-300 uppercase tracking-wide">
                    @if(Auth::user()->roles == 'admin') Administrator
                    @elseif(Auth::user()->roles == 'guru') Guru Pengajar
                    @elseif(Auth::user()->roles == 'siswa') Siswa Aktif
                    @else {{ Auth::user()->roles }}
                    @endif
                </span>
            </div>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-2 space-y-6 overflow-y-auto">
        <!-- Group: Utama -->
        <div>
            <p class="px-3 text-[11px] font-semibold tracking-wider text-slate-400 uppercase mb-2">Menu Utama</p>
            <div class="space-y-1">
                <a href="{{ route('/') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('/') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                @if (Auth::user()->roles == 'guru' || Auth::user()->roles == 'siswa')
                <a href="{{ route('elearning') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('elearning*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span>Kelas E-Learning</span>
                </a>
                @endif

                <a href="{{ route('jadwal-mapel') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('jadwal-mapel*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Jadwal Pelajaran</span>
                </a>

                @if (Auth::user()->roles == 'guru' || Auth::user()->roles == 'siswa')
                <a href="{{ route('profile') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('profile*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profil Pengguna</span>
                </a>
                @endif
            </div>
        </div>

        <!-- Group: Master Data (Admin Only) -->
        @if (Auth::user()->roles == 'admin')
        <div>
            <p class="px-3 text-[11px] font-semibold tracking-wider text-slate-400 uppercase mb-2">Manajemen Data</p>
            <div class="space-y-1">
                <a href="{{ route('data-siswa') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('data-siswa*', 'show-siswa*', 'tambah-siswa*', 'edit-siswa*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Data Siswa</span>
                </a>

                <a href="{{ route('data-guru') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('data-guru*', 'tambah-guru*', 'edit-guru*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span>Data Guru</span>
                </a>

                <a href="{{ route('data-walikelas') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('data-walikelas*', 'tambahwalkel*', 'edit-walkel*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span>Data Wali Kelas</span>
                </a>

                <a href="{{ route('mapel') }}" 
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('mapel*', 'tambah-mapel*', 'edit-mapel*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-300 hover:bg-slate-800/70 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span>Mata Pelajaran</span>
                </a>
            </div>
        </div>
        @endif

        <!-- Group: Informasi -->
        <div>
            <p class="px-3 text-[11px] font-semibold tracking-wider text-slate-400 uppercase mb-2">Informasi</p>
            <div class="space-y-1">
                <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-slate-800/70 hover:text-white transition">
                    <svg class="w-5 h-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Tentang Sekolah</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Sidebar Footer / Logout -->
    <div class="p-4 border-t border-slate-800/80 bg-slate-950/30 shrink-0">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center justify-center space-x-2.5 px-4 py-2.5 rounded-xl text-sm font-medium text-rose-300 hover:text-rose-100 hover:bg-rose-950/40 border border-rose-900/40 hover:border-rose-800/60 transition group cursor-pointer">
                <svg class="w-4 h-4 text-rose-400 group-hover:text-rose-200 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Keluar Akun</span>
            </button>
        </form>
        <p class="text-[11px] text-center text-slate-400 mt-2.5 font-medium">SMK Academic LMS • 2024/2025</p>
    </div>
</div>
