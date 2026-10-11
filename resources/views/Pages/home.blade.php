<x-main-layout>
    <x-sidebar>
        <!-- Page Header & Academic Welcome Banner -->
        <div class="mb-8">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 text-white p-6 sm:p-8 lg:p-10 shadow-xl border border-indigo-900/30">
                <!-- Background Geometric Glow -->
                <div class="absolute -right-10 -top-10 w-72 h-72 rounded-full bg-indigo-500/10 blur-3xl pointer-events-none"></div>
                <div class="absolute right-20 -bottom-10 w-64 h-64 rounded-full bg-blue-500/10 blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-3xl">
                    <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-indigo-200 text-xs font-semibold mb-4 border border-white/10">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Portal Pembelajaran Digital & Akademik SMK</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white mb-2">
                        Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-200 via-white to-blue-200">{{ Auth::user()->name }}</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-2xl">
                        Akses modul materi, kerjakan penugasan, pantau jadwal pelajaran, dan kelola aktivitas belajar mengajar secara terintegrasi dan profesional.
                    </p>

                    <!-- Academic Badges -->
                    <div class="flex flex-wrap items-center gap-3 mt-6">
                        <span class="inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-xl bg-white/10 text-white backdrop-blur-sm border border-white/10">
                            <svg class="w-4 h-4 mr-1.5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Peran: <strong class="ml-1 uppercase">{{ Auth::user()->roles }}</strong>
                        </span>
                        <span class="inline-flex items-center text-xs font-semibold px-3 py-1.5 rounded-xl bg-white/10 text-white backdrop-blur-sm border border-white/10">
                            <svg class="w-4 h-4 mr-1.5 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            T.A. 2024/2025 (Ganjil)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic KPI Metrics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Card 1: Data Siswa -->
            <div class="relative overflow-hidden rounded-2xl bg-white border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Total Siswa</p>
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $datasiswa }}</h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mr-1.5"></span>
                            Siswa aktif terdaftar
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                </div>
                @if (Auth::user()->roles == 'admin')
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('data-siswa') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 flex items-center">
                        Kelola Data Siswa
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>

            <!-- Card 2: Data Guru -->
            <div class="relative overflow-hidden rounded-2xl bg-white border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Tenaga Pendidik</p>
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $dataguru }}</h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                            Guru mata pelajaran aktif
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
                @if (Auth::user()->roles == 'admin')
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('data-guru') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-800 flex items-center">
                        Kelola Data Guru
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>

            <!-- Card 3: Ruang Kelas -->
            <div class="relative overflow-hidden rounded-2xl bg-white border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition-all group sm:col-span-2 lg:col-span-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Ruang Kelas</p>
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $ruangkelas }}</h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                            Rombongan belajar (Rombel)
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('jadwal-mapel') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-800 flex items-center">
                        Lihat Jadwal Pelajaran
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Academic Quick Access & Noticeboard -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left: Quick Links -->
            <div class="lg:col-span-2 space-y-6">
                <div class="rounded-2xl bg-white border border-slate-200/80 p-6 shadow-sm">
                    <h2 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Akses Cepat Pembelajaran
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if (Auth::user()->roles == 'guru' || Auth::user()->roles == 'siswa')
                        <a href="{{ route('elearning') }}" class="p-4 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50/40 transition group flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-indigo-600 transition">Masuk Kelas E-Learning</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Buka materi pertemuan dan lembar tugas pelajaran.</p>
                            </div>
                        </a>
                        @endif

                        <a href="{{ route('jadwal-mapel') }}" class="p-4 rounded-xl border border-slate-200 hover:border-blue-500 hover:bg-blue-50/40 transition group flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition">Jadwal Mata Pelajaran</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Cek agenda kelas harian dan jam pelajaran.</p>
                            </div>
                        </a>

                        @if (Auth::user()->roles == 'admin')
                        <a href="{{ route('data-siswa') }}" class="p-4 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50/40 transition group flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-indigo-600 transition">Master Data Siswa</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Pendataan NIS, kelas, dan akun login siswa.</p>
                            </div>
                        </a>

                        <a href="{{ route('mapel') }}" class="p-4 rounded-xl border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50/40 transition group flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-emerald-600 transition">Mata Pelajaran</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Kelola kurikulum dan alokasi guru pengajar.</p>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right: Academic Guidelines & Info -->
            <div class="space-y-6">
                <div class="rounded-2xl bg-white border border-slate-200/80 p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pedoman Pembelajaran
                    </h3>
                    <ul class="space-y-3 text-xs text-slate-600">
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5 mr-2 shrink-0"></span>
                            <span>Pastikan materi pertemuan dipelajari sebelum batas waktu pengumpulan tugas.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5 mr-2 shrink-0"></span>
                            <span>Unggah file tugas dalam format <strong>PDF</strong> agar terbaca oleh sistem penilaian guru.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5 mr-2 shrink-0"></span>
                            <span>Apabila mengalami kendala akun atau akses materi, hubungi bagian kurikulum sekolah.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
