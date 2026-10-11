<x-main-layout>
    <x-sidebar>
        <!-- Success Alert Notification -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Subject Header & Breadcrumb -->
        <div class="mb-8">
            <div class="mb-3">
                <a href="{{ route('elearning') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-indigo-600 transition group">
                    <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Daftar Kelas
                </a>
            </div>

            <!-- Subject Hero Banner -->
            <div class="rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white p-6 sm:p-8 shadow-lg border border-slate-800 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-3">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-extrabold bg-indigo-500 text-white uppercase tracking-wider">
                            {{ $mapel->kode_mapel }}
                        </span>
                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white/10 text-slate-200 backdrop-blur-sm">
                            Kelas {{ $mapel->kelas }} • {{ $mapel->jurusan }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        {{ $mapel->name_mapel }}
                    </h1>

                    <div class="flex items-center mt-3 text-xs sm:text-sm text-slate-300">
                        <div class="w-6 h-6 rounded-full bg-indigo-600/50 flex items-center justify-center mr-2 text-white font-bold text-xs">
                            {{ strtoupper(substr($mapel->nameGuru ?? 'G', 0, 1)) }}
                        </div>
                        <span>Guru Pengajar: <strong class="text-white">{{ $mapel->nameGuru }}</strong></span>
                    </div>
                </div>

                <!-- Teacher Actions -->
                @if (Auth::user()->roles == 'guru')
                <div class="flex flex-wrap sm:flex-nowrap gap-3 shrink-0">
                    <a href="{{ route('pertemuan', $mapel->slug) }}"
                       class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-600/30 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        + Tambah Pertemuan
                    </a>

                    <a href="{{ route('tugas', $mapel->slug) }}"
                       class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-emerald-600 hover:bg-emerald-500 text-white shadow-md shadow-emerald-600/30 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        + Tambah Tugas
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Content Grid: Materi (Pertemuan) & Tugas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- SECTION 1: MATERI & PERTEMUAN -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-slate-900">Modul & Pertemuan</h2>
                    </div>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg">
                        {{ count($materi) }} Sesi
                    </span>
                </div>

                <div class="space-y-3">
                    @forelse ($materi as $data)
                        <div class="rounded-2xl bg-white border border-slate-200/90 p-5 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center space-x-3 min-w-0">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 font-extrabold flex items-center justify-center text-xs shrink-0 border border-indigo-100">
                                        P-{{ $data->pertemuan }}
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="text-sm font-bold text-slate-900 truncate">
                                            Pertemuan Ke-{{ $data->pertemuan }}
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">Materi digital pembelajaran</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2 shrink-0">
                                    <a href="{{ route('download-materi', $data->slug) }}" 
                                       class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-indigo-50 hover:bg-indigo-600 text-indigo-700 hover:text-white border border-indigo-200/80 transition group">
                                        <svg class="w-3.5 h-3.5 mr-1 text-indigo-600 group-hover:text-white transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Unduh PDF
                                    </a>

                                    @if (Auth::user()->roles == 'guru')
                                        <!-- Edit -->
                                        <a href="{{ route('edit-pertemuan', $data->slug) }}" 
                                           class="p-2 rounded-xl text-slate-500 hover:text-indigo-600 hover:bg-slate-100 transition"
                                           title="Edit Pertemuan">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('delete-pertemuan', $data->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pertemuan ini?')">
                                            @csrf
                                            <button type="submit" 
                                                    class="p-2 rounded-xl text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition"
                                                    title="Hapus Pertemuan">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 px-4 bg-white rounded-2xl border border-dashed border-slate-300">
                            <p class="text-xs font-semibold text-slate-500">Belum ada materi pertemuan yang diunggah.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- SECTION 2: TUGAS AKADEMIK -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-slate-900">Penugasan & Evaluasi</h2>
                    </div>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-lg">
                        {{ count($tugas) }} Tugas
                    </span>
                </div>

                <div class="space-y-3">
                    @forelse ($tugas as $assig)
                        <div class="rounded-2xl bg-white border border-slate-200/90 p-5 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center space-x-3 min-w-0">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 font-extrabold flex items-center justify-center text-xs shrink-0 border border-emerald-100">
                                        T-{{ $assig->tugas }}
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="text-sm font-bold text-slate-900 truncate">
                                            Lembar Tugas Ke-{{ $assig->tugas }}
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">Penugasan mandiri siswa</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2 shrink-0">
                                    <a href="{{ route('open-tugas', $assig->slug) }}" 
                                       class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200/80 transition group">
                                        <span>Buka Tugas</span>
                                        <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>

                                    @if (Auth::user()->roles == 'guru')
                                        <!-- Edit -->
                                        <a href="{{ route('edit-tugas', $assig->slug) }}" 
                                           class="p-2 rounded-xl text-slate-500 hover:text-indigo-600 hover:bg-slate-100 transition"
                                           title="Edit Tugas">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('delete-tugas', $assig->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                            @csrf
                                            <button type="submit" 
                                                    class="p-2 rounded-xl text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition"
                                                    title="Hapus Tugas">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 px-4 bg-white rounded-2xl border border-dashed border-slate-300">
                            <p class="text-xs font-semibold text-slate-500">Belum ada tugas yang diberikan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
