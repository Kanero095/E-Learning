<x-main-layout>
    <x-sidebar>
        <!-- Success Notification -->
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

        <!-- Breadcrumb & Header -->
        <div class="mb-6">
            <div class="mb-3">
                <a href="{{ route('open-mapel', $mapel->slug) }}" 
                   class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-indigo-600 transition group">
                    <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Kelas {{ $tugas->name_mapel }}
                </a>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-indigo-600 uppercase tracking-wider mb-1">
                        <span>{{ $tugas->kode_mapel }}</span>
                        <span>•</span>
                        <span>{{ $tugas->name_mapel }}</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Lembar Tugas Ke-{{ $tugas->tugas }}
                    </h1>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Tugas Akademik
                    </span>
                </div>
            </div>
        </div>

        <!-- Time Remaining Calculation -->
        @php
            $diffInSeconds = now()->diffInSeconds($tugas->due, false);
            $isOverdue = now() > $tugas->due;
            
            $absDiff = abs($diffInSeconds);
            $days = floor($absDiff / 86400);
            $hours = floor(($absDiff % 86400) / 3600);
            $minutes = floor(($absDiff % 3600) / 60);
        @endphp

        <!-- Assignment Overview Grid (Soal & Timeline) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            <!-- Left: Soal Tugas Content (2 Cols) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="rounded-2xl bg-white border border-slate-200/90 p-6 sm:p-8 shadow-sm">
                    <h2 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Instruksi & Soal Tugas
                    </h2>

                    @if ($tugas->soalpdf == true)
                        <div class="p-6 rounded-2xl bg-indigo-50/50 border border-indigo-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-rose-500 text-white flex items-center justify-center shrink-0 shadow-md">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Berkas Soal Tugas (PDF)</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Silakan unduh dokumen untuk melihat instruksi lengkap</p>
                                </div>
                            </div>
                            <a href="{{ route('download-tugas', $tugas->slug) }}" 
                               class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-600/30 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Unduh Soal Tugas
                            </a>
                        </div>
                    @else
                        <div class="prose max-w-none text-sm text-slate-700 leading-relaxed bg-slate-50 p-6 rounded-2xl border border-slate-200/80" id="soal-content">
                            {!! $tugas->soalteks !!}
                        </div>
                    @endif
                </div>

                <!-- Student Submission Dossier (For Roles Siswa) -->
                @if (Auth::user()->roles == 'siswa')
                    <div class="rounded-2xl bg-white border border-slate-200/90 p-6 sm:p-8 shadow-sm">
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                            <h2 class="text-base font-bold text-slate-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Status Pengumpulan Tugas Anda
                            </h2>

                            <!-- Submission Action Button -->
                            @if (!is_null(optional($jawabanSiswa)->jawabanpdf) || !is_null(optional($jawabanSiswa)->jawabanteks))
                                @if (now() <= $tugas->due)
                                    <a href="{{ route('edit-jawaban', $slug = $jawabanSiswa->slugJawaban) }}"
                                       class="inline-flex items-center px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 transition">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit Jawaban
                                    </a>
                                @endif
                            @elseif(!$isOverdue)
                                <a href="{{ route('jawab', $tugas->slug) }}"
                                   class="inline-flex items-center px-4 py-2 rounded-xl text-xs font-bold bg-emerald-600 hover:bg-emerald-500 text-white shadow-md shadow-emerald-600/30 transition">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Unggah Jawaban Sekarang
                                </a>
                            @endif
                        </div>

                        <!-- Status Cards Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                            <!-- Status -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Status Penyerahan</p>
                                @if (!is_null(optional($jawabanSiswa)->jawabanpdf) || !is_null(optional($jawabanSiswa)->jawabanteks))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 mr-1.5"></span>
                                        Sudah Dikumpulkan
                                    </span>
                                @elseif($isOverdue)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-rose-100 text-rose-800">
                                        Terlambat / Lewat Batas
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-800">
                                        Belum Dikumpulkan
                                    </span>
                                @endif
                            </div>

                            <!-- Waktu Penyerahan -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Waktu Penyerahan</p>
                                <p class="text-xs font-bold text-slate-800 mt-1">
                                    {{ $jawabanSiswa->pengumpulan ?? '—' }}
                                </p>
                            </div>

                            <!-- Nilai Akhir -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Nilai Evaluasi</p>
                                @if (!is_null(optional($jawabanSiswa)->nilai))
                                    <div class="flex items-baseline space-x-1 mt-0.5">
                                        <span class="text-2xl font-black text-indigo-600">{{ $jawabanSiswa->nilai }}</span>
                                        <span class="text-xs text-slate-500 font-semibold">/ 100</span>
                                    </div>
                                @elseif(!is_null(optional($jawabanSiswa)->jawabanpdf) || !is_null(optional($jawabanSiswa)->jawabanteks))
                                    <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md inline-block mt-1">
                                        Menunggu Penilaian
                                    </span>
                                @else
                                    <span class="text-xs text-slate-500 mt-1 block">Belum ada nilai</span>
                                @endif
                            </div>
                        </div>

                        <!-- Jawaban Siswa Content Block -->
                        @if (!is_null(optional($jawabanSiswa)->jawabanpdf) && $jawabanSiswa->slugTugas == $tugas->slug)
                            <div class="p-4 rounded-xl bg-indigo-50/40 border border-indigo-100 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-xs font-bold text-slate-800">Berkas Jawaban Anda (PDF)</span>
                                </div>
                                <a href="{{ route('download-jawaban', $jawabanSiswa->slugJawaban) }}"
                                   class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-indigo-600 text-white hover:bg-indigo-700 transition">
                                    Unduh Jawaban Saya
                                </a>
                            </div>
                        @elseif(!is_null(optional($jawabanSiswa)->jawabanteks) && $jawabanSiswa->slugTugas == $tugas->slug)
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                                <p class="text-xs font-bold text-slate-700 mb-2">Jawaban Teks Terunggah:</p>
                                <div class="prose max-w-none text-xs text-slate-800 bg-white p-4 rounded-lg border border-slate-200">
                                    {!! $jawabanSiswa->jawabanteks !!}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Right: Timeline & Countdown Widget (1 Col) -->
            <div class="space-y-6">
                <div class="rounded-2xl bg-white border border-slate-200/90 p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Jadwal & Batas Waktu
                    </h3>

                    <!-- Opened Time -->
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/70 mb-3">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">Mulai Dibuka</p>
                        <p class="text-xs font-bold text-slate-800 mt-0.5">{{ $tugas->opened }}</p>
                    </div>

                    <!-- Due Time -->
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/70 mb-4">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">Batas Pengumpulan (Due)</p>
                        <p class="text-xs font-bold text-slate-800 mt-0.5">{{ $tugas->due }}</p>
                    </div>

                    <!-- Countdown Time Left Badge -->
                    <div class="p-4 rounded-xl {{ $isOverdue ? 'bg-rose-50 border border-rose-200 text-rose-800' : 'bg-emerald-50 border border-emerald-200 text-emerald-800' }}">
                        <p class="text-[11px] font-semibold uppercase tracking-wider">Sisa Waktu Penyerahan</p>
                        <p class="text-sm font-extrabold mt-1">
                            @if ($isOverdue)
                                Waktu Pengumpulan Telah Habis
                            @else
                                {{ $days > 0 ? $days . ' hari ' : '' }}
                                {{ $hours > 0 ? $hours . ' jam ' : '' }}
                                {{ $minutes > 0 ? $minutes . ' menit ' : '' }}
                                {{ $absDiff % 60 }} detik
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Teacher Scoring & Submissions Dashboard (For Roles Guru) -->
        @if (Auth::user()->roles == 'guru')
            <div class="rounded-2xl bg-white border border-slate-200/90 shadow-sm overflow-hidden mb-12">
                <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Daftar Pengumpulan Jawaban Siswa
                        </h2>
                        <p class="text-xs text-slate-500 mt-1">Periksa berkas jawaban dan berikan nilai akademik untuk setiap siswa</p>
                    </div>
                    <span class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-xl shrink-0">
                        Total: {{ count($Alljawaban) }} Siswa Mengumpulkan
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[11px] border-b border-slate-200">
                            <tr>
                                <th class="px-4 py-3.5 text-center w-12">No</th>
                                <th class="px-4 py-3.5">NIS</th>
                                <th class="px-4 py-3.5">Nama Siswa</th>
                                <th class="px-4 py-3.5 text-center">Kelas</th>
                                <th class="px-4 py-3.5">Berkas Jawaban</th>
                                <th class="px-4 py-3.5">Waktu Penyerahan</th>
                                <th class="px-4 py-3.5 text-center">Nilai</th>
                                <th class="px-4 py-3.5 text-center w-28">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200/80">
                            @forelse ($Alljawaban as $data)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-4 py-3.5 text-center font-semibold text-slate-500">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3.5 font-mono text-slate-700 font-semibold">{{ $data->nis }}</td>
                                    <td class="px-4 py-3.5 font-bold text-slate-900">{{ $data->nameSiswa }}</td>
                                    <td class="px-4 py-3.5 text-center">
                                        <span class="px-2 py-0.5 rounded-md text-[11px] font-semibold bg-slate-100 text-slate-700">
                                            {{ $data->kelas }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        @if (!is_null(optional($data)->jawabanpdf) && $data->slugTugas == $tugas->slug)
                                            <a href="{{ route('download-jawaban', $data->slugJawaban) }}" 
                                               class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-indigo-50 hover:bg-indigo-600 text-indigo-700 hover:text-white transition group">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                Unduh PDF
                                            </a>
                                        @elseif(!is_null(optional($data)->jawabanteks) && $data->slugTugas == $tugas->slug)
                                            <span class="text-slate-600 italic line-clamp-1 max-w-xs">{!! strip_tags($data->jawabanteks) !!}</span>
                                        @else
                                            <span class="text-slate-400 italic">—</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3.5 text-slate-600">{{ $data->pengumpulan }}</td>
                                    <td class="px-4 py-3.5 text-center">
                                        @if (!is_null(optional($data)->nilai))
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg font-bold text-xs bg-emerald-100 text-emerald-800">
                                                {{ $data->nilai }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold bg-amber-100 text-amber-800">
                                                Belum Dinilai
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3.5 text-center">
                                        <a href="{{ route('edit-nilai', $data->slugJawaban) }}" 
                                           class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-indigo-50 hover:bg-indigo-600 text-indigo-700 hover:text-white transition">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Nilai
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-12 text-slate-500 italic">
                                        Belum ada jawaban siswa yang dikumpulkan untuk tugas ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </x-sidebar>
</x-main-layout>
