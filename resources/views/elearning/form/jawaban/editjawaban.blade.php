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
                <span class="text-xs font-semibold text-amber-700 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Mode Sunting Jawaban Siswa
                </span>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <div class="inline-flex items-center space-x-2 px-2.5 py-1 rounded-md bg-indigo-50 text-indigo-700 text-xs font-bold font-mono mb-2">
                        Tugas Ke-{{ $jawaban->tugas }}
                    </div>
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-800">{{ $jawaban->name_mapel }} : Perbarui Hasil Jawaban</h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Kamu dapat mengunggah berkas PDF baru dan/atau memperbarui teks jawaban.</p>
                </div>

                <div class="p-6 sm:px-8 space-y-6">
                    <x-validation-errors class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700" />

                    <!-- Previous Submission Showcase -->
                    <div class="space-y-4">
                        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Berkas Jawaban Tersimpan Sebelumnya</h2>
                        
                        @if (!is_null(optional($jawaban)->jawabanpdf))
                            <div class="p-4 rounded-2xl bg-indigo-50/60 border border-indigo-100 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-xl bg-indigo-600 text-white shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-slate-800">File_Jawaban_{{ $jawaban->nis }}_{{ $jawaban->nameSiswa }}_Tugas_{{ $jawaban->tugas }}.pdf</p>
                                        <p class="text-[11px] text-slate-500">Tersimpan di peladen</p>
                                    </div>
                                </div>
                                <a href="{{ route('download-jawaban', $jawaban->slugJawaban) }}"
                                    class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-indigo-700 bg-white border border-indigo-200 hover:bg-indigo-50 shadow-sm transition-all">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>Unduh Dokumen</span>
                                </a>
                            </div>
                        @endif

                        @if (!is_null(optional($jawaban)->jawabanteks))
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                                <span class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Jawaban Teks Sebelumnya:</span>
                                <div class="text-sm text-slate-700 prose prose-sm max-w-none bg-white p-3 rounded-xl border border-slate-100">
                                    {!! $jawaban->jawabanteks !!}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Update Form -->
                    <form action="{{ route('update-jawaban', $slug = $jawaban->slugJawaban) }}" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-6 pt-4 border-t border-slate-100">
                        @csrf

                        {{-- File Jawaban PDF Baru --}}
                        <div>
                            <label for="jawabanpdf" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Ganti Berkas Jawaban (PDF) <span class="text-xs font-normal text-slate-400 normal-case">(kosongkan jika tidak mengganti dokumen PDF)</span>
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-indigo-400 transition-colors bg-slate-50/50">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="jawabanpdf" class="relative cursor-pointer font-bold text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Pilih berkas PDF baru</span>
                                            <input id="jawabanpdf" name="jawabanpdf" type="file" accept=".pdf" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau seret ke sini</p>
                                    </div>
                                    <p class="text-xs text-slate-400">Berkas format .pdf maks 10MB</p>
                                </div>
                            </div>
                        </div>

                        {{-- Editor Jawaban Baru --}}
                        <div>
                            <label for="myeditorinstance" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Perbarui Jawaban Teks Digital (Opsional)
                            </label>
                            <div class="rounded-2xl overflow-hidden border border-slate-200">
                                <textarea name="myeditorinstance" id="myeditorinstance" rows="10"></textarea>
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
                                <span>Simpan Pembaruan Jawaban</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
