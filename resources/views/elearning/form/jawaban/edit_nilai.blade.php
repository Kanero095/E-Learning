<x-main-layout>
    <x-sidebar>
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Header & Navigation -->
            <div class="flex items-center justify-between">
                <a href="{{ route('open-tugas', $slug = $jawaban->slugTugas) }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Lembar Tugas</span>
                </a>
                <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full border border-indigo-100">
                    Form Evaluasi & Penilaian
                </span>
            </div>

            <!-- Grading Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <div class="inline-flex items-center space-x-2 px-2.5 py-1 rounded-md bg-indigo-50 text-indigo-700 text-xs font-bold font-mono mb-2">
                        Evaluasi Tugas Ke-{{ $jawaban->tugas }}
                    </div>
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-800">{{ $jawaban->name_mapel }} : Penilaian Hasil Siswa</h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Periksa dokumen atau jawaban teks siswa kemudian berikan nilai capaian pembelajaran.</p>
                </div>

                <div class="p-6 sm:px-8 space-y-6">
                    <x-validation-errors class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700" />

                    <!-- Student & Course Meta Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 text-sm">
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Mata Pelajaran</span>
                            <span class="font-bold text-slate-800">{{ $jawaban->kode_mapel }} - {{ $jawaban->name_mapel }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Siswa Terdaftar</span>
                            <span class="font-bold text-slate-800">{{ $jawaban->nis }} - {{ $jawaban->nameSiswa }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Rombel / Kelas</span>
                            <span class="font-bold text-slate-800">{{ $jawaban->kelas }}</span>
                        </div>
                    </div>

                    <!-- Student Submission Review Section -->
                    <div class="space-y-3">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Berkas & Jawaban Siswa
                        </label>

                        @if (!is_null(optional($jawaban)->jawabanpdf))
                            <div class="p-5 rounded-2xl bg-indigo-50/60 border border-indigo-100 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 rounded-xl bg-indigo-600 text-white shadow-sm">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-bold text-slate-800">Dokumen Tugas Siswa (PDF)</h2>
                                        <p class="text-xs text-slate-500 font-mono">File_Jawaban_{{ $jawaban->nis }}_{{ $jawaban->nameSiswa }}.pdf</p>
                                    </div>
                                </div>
                                <a href="{{ route('download-jawaban', $jawaban->slugJawaban) }}"
                                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>Unduh & Periksa PDF</span>
                                </a>
                            </div>
                        @elseif (!is_null(optional($jawaban)->jawabanteks))
                            <div class="p-4 rounded-2xl bg-white border border-slate-200">
                                <textarea name="myeditorinstance" id="myeditorinstance">{!! $jawaban->jawabanteks !!}</textarea>
                            </div>
                        @else
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-500 italic text-center">
                                Siswa belum menyertakan lampiran berkas atau teks jawaban.
                            </div>
                        @endif
                    </div>

                    <!-- Grading Form -->
                    <form action="{{ route('upload-nilai', $jawaban->slugJawaban) }}" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-6 pt-4 border-t border-slate-100">
                        @csrf

                        <div class="max-w-xs">
                            <label for="penilaian" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Nilai Angka Capaian (0 - 100) <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" name="penilaian" id="penilaian" min="0" max="100" step="any" required value="{{ $jawaban->nilai }}"
                                    placeholder="Contoh: 85"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-base font-bold focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all font-mono" />
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400 text-xs font-bold">
                                    / 100
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('open-tugas', $slug = $jawaban->slugTugas) }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-800 transition-all">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center space-x-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 active:scale-[0.99] shadow-lg shadow-indigo-600/30 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Simpan & Terbitkan Nilai</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
