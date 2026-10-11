<x-main-layout>
    <x-sidebar>
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Breadcrumb & Back Action -->
            <div class="flex items-center justify-between">
                <a href="{{ route('data-siswa') }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Data Siswa</span>
                </a>
                <span class="text-xs font-medium text-slate-400">Berkas Biodata Siswa</span>
            </div>

            <!-- Student Profile Dossier Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 text-white p-6 sm:p-8 shadow-xl border border-indigo-900/40">
                <div class="absolute -right-8 -top-8 w-60 h-60 rounded-full bg-indigo-500/10 blur-3xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                    <div class="flex items-center space-x-5">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-tr from-emerald-500 to-indigo-500 p-1 shadow-lg ring-4 ring-white/10 shrink-0">
                            <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center text-white text-2xl sm:text-3xl font-extrabold shadow-inner">
                                {{ strtoupper(substr($siswa->nameSiswa ?? 'S', 0, 2)) }}
                            </div>
                        </div>
                        <div>
                            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-emerald-300 text-xs font-semibold mb-2 border border-white/10">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span>Siswa Terdaftar Aktif</span>
                            </div>
                            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                                {{ $siswa->nameSiswa }}
                            </h1>
                            <p class="text-indigo-200/80 text-sm mt-0.5">
                                {{ $siswa->email }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <div class="px-4 py-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-center">
                            <span class="block text-[11px] font-semibold text-indigo-200 uppercase tracking-wider">NIS</span>
                            <span class="text-base font-bold text-white font-mono">{{ $siswa->nis }}</span>
                        </div>
                        <div class="px-4 py-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-center">
                            <span class="block text-[11px] font-semibold text-indigo-200 uppercase tracking-wider">Kelas / Jurusan</span>
                            <span class="text-base font-bold text-white">{{ $siswa->kelas }} {{ $siswa->jurusan }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Information -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Biodata Lengkap Siswa</h2>
                        <p class="text-xs text-slate-500">Detail identitas resmi pada pangkalan data sekolah</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold border border-indigo-100">
                        Mode Pratinjau
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Nomor Induk Siswa (NIS)</span>
                        <span class="text-sm font-bold text-slate-800 font-mono">{{ $siswa->nis }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</span>
                        <span class="text-sm font-bold text-slate-800">{{ $siswa->nameSiswa }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Alamat Email</span>
                        <span class="text-sm font-medium text-slate-800 break-all">{{ $siswa->email }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Tempat Lahir</span>
                        <span class="text-sm font-bold text-slate-800">{{ $siswa->tempatlahir }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Tanggal Lahir</span>
                        <span class="text-sm font-bold text-slate-800">
                            {{ \Carbon\Carbon::parse($siswa->tanggallahir)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Jenis Kelamin</span>
                        <span class="text-sm font-bold text-slate-800">{{ $siswa->gender }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Tingkat Kelas</span>
                        <span class="text-sm font-bold text-slate-800">Kelas {{ $siswa->kelas }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Program Keahlian / Jurusan</span>
                        <span class="text-sm font-bold text-slate-800">{{ $siswa->jurusan }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-100">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Agama</span>
                        <span class="text-sm font-bold text-slate-800">{{ $siswa->agama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
