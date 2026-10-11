<x-main-layout>
    <x-sidebar>
        <div class="max-w-5xl mx-auto space-y-6">
            <!-- Header Dossier Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 text-white p-6 sm:p-8 shadow-xl border border-indigo-900/40">
                <div class="absolute -right-8 -top-8 w-60 h-60 rounded-full bg-indigo-500/10 blur-3xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="flex items-center space-x-5">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-tr from-indigo-500 to-blue-500 p-1 shadow-lg ring-4 ring-white/10 shrink-0">
                            <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center text-white text-2xl sm:text-3xl font-extrabold shadow-inner">
                                @if (Auth::user()->roles == 'siswa')
                                    {{ strtoupper(substr($user->nameSiswa ?? Auth::user()->name, 0, 2)) }}
                                @elseif (Auth::user()->roles == 'guru')
                                    {{ strtoupper(substr($user->nameGuru ?? Auth::user()->name, 0, 2)) }}
                                @else
                                    {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-indigo-200 text-xs font-semibold mb-2 border border-white/10">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="capitalize">Peran: {{ Auth::user()->roles }}</span>
                            </div>
                            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                                @if (Auth::user()->roles == 'siswa')
                                    {{ $user->nameSiswa }}
                                @elseif (Auth::user()->roles == 'guru')
                                    {{ $user->nameGuru }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </h1>
                            <p class="text-indigo-200/80 text-sm mt-0.5">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                        @if (Auth::user()->roles == 'siswa')
                            <div class="px-4 py-2 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-center">
                                <span class="block text-[11px] font-semibold text-indigo-200 uppercase tracking-wider">Nomor Induk Siswa</span>
                                <span class="text-base font-bold text-white font-mono">{{ $user->nis }}</span>
                            </div>
                            <div class="px-4 py-2 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-center">
                                <span class="block text-[11px] font-semibold text-indigo-200 uppercase tracking-wider">Rombel</span>
                                <span class="text-base font-bold text-white">{{ $user->kelas }} {{ $user->jurusan }}</span>
                            </div>
                        @elseif (Auth::user()->roles == 'guru')
                            <div class="px-4 py-2 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-center">
                                <span class="block text-[11px] font-semibold text-indigo-200 uppercase tracking-wider">NUPTK</span>
                                <span class="text-base font-bold text-white font-mono">{{ $user->nuptk }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile Details Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Academic Credentials Box -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-5">
                    <div class="flex items-center space-x-3 pb-3 border-b border-slate-100">
                        <div class="p-2 rounded-lg bg-indigo-50 text-indigo-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-slate-800">Status Akademik</h2>
                            <p class="text-xs text-slate-500">Verifikasi akun institusi</p>
                        </div>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div>
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Peran Akses</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider
                                @if (Auth::user()->roles == 'admin') bg-purple-100 text-purple-700
                                @elseif (Auth::user()->roles == 'guru') bg-blue-100 text-blue-700
                                @else bg-emerald-100 text-emerald-700 @endif">
                                {{ Auth::user()->roles }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Email Terdaftar</span>
                            <span class="font-medium text-slate-800 break-all">{{ Auth::user()->email }}</span>
                        </div>

                        <div>
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Status Keaktifan</span>
                            <span class="inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-600">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>Aktif di Semester Berjalan</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Personal Information Box -->
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-6">
                    <div class="flex items-center space-x-3 pb-3 border-b border-slate-100">
                        <div class="p-2 rounded-lg bg-blue-50 text-blue-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-slate-800">Data Pokok Pengguna</h2>
                            <p class="text-xs text-slate-500">Informasi biodata sesuai basis data sekolah</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        {{-- NIS / NUPTK --}}
                        @if (Auth::user()->roles == 'siswa')
                            <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">NIS (Nomor Induk Siswa)</span>
                                <span class="text-sm font-bold text-slate-800 font-mono">{{ $user->nis }}</span>
                            </div>
                        @elseif (Auth::user()->roles == 'guru')
                            <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">NUPTK Tenaga Pendidik</span>
                                <span class="text-sm font-bold text-slate-800 font-mono">{{ $user->nuptk }}</span>
                            </div>
                        @endif

                        {{-- Nama Lengkap --}}
                        <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</span>
                            <span class="text-sm font-bold text-slate-800">
                                @if (Auth::user()->roles == 'siswa')
                                    {{ $user->nameSiswa }}
                                @elseif (Auth::user()->roles == 'guru')
                                    {{ $user->nameGuru }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </span>
                        </div>

                        {{-- Gender --}}
                        <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Jenis Kelamin</span>
                            <span class="text-sm font-bold text-slate-800">{{ $user->gender ?? '-' }}</span>
                        </div>

                        {{-- Tempat, Tanggal Lahir --}}
                        @if (Auth::user()->roles == 'siswa')
                            <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</span>
                                <span class="text-sm font-bold text-slate-800 capitalize">
                                    {{ $user->tempatlahir }}, {{ \Carbon\Carbon::parse($user->tanggallahir)->translatedFormat('d F Y') }}
                                </span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Agama</span>
                                <span class="text-sm font-bold text-slate-800">{{ $user->agama }}</span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Kelas & Jurusan</span>
                                <span class="text-sm font-bold text-slate-800">{{ $user->kelas }} - {{ $user->jurusan }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
