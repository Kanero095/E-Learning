<x-main-layout>
    <x-sidebar>
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Header & Navigation -->
            <div class="flex items-center justify-between">
                <a href="{{ route('open-mapel', $mapel->slug) }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Ruang Mapel</span>
                </a>
                <span class="text-xs font-semibold text-amber-700 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Mode Sunting Tugas
                </span>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <div class="inline-flex items-center space-x-2 px-2.5 py-1 rounded-md bg-indigo-50 text-indigo-700 text-xs font-bold font-mono mb-2">
                        Tugas Ke-{{ $tugas->tugas }}
                    </div>
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-800">{{ $tugas->name_mapel }} : Edit Tugas {{ $tugas->tugas }}</h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Perbarui tenggat waktu, berkas soal kerja, atau redaksi instruksi penugasan.</p>
                </div>

                <div class="p-6 sm:px-8">
                    <x-validation-errors class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700" />

                    <form action="{{ route('update-tugas', $tugas->slug) }}" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            {{-- Tugas ke-? --}}
                            <div>
                                <label for="tugas" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Tugas ke- <span class="text-rose-500">*</span>
                                </label>
                                <input type="number" name="tugas" id="tugas" required min="1" value="{{ $tugas->tugas }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all font-mono" />
                            </div>

                            {{-- Opened --}}
                            <div>
                                <label for="opened" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Mulai Dibuka (Opened) <span class="text-rose-500">*</span>
                                </label>
                                <input type="datetime-local" name="opened" id="opened" required value="{{ $tugas->opened }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>

                            {{-- Due --}}
                            <div>
                                <label for="due" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Tenggat Waktu (Due) <span class="text-rose-500">*</span>
                                </label>
                                <input type="datetime-local" name="due" id="due" required value="{{ $tugas->due }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>
                        </div>

                        {{-- File Tugas --}}
                        <div>
                            <label for="soalpdf" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Berkas Lampiran Soal Baru (PDF) <span class="text-xs font-normal text-slate-400 normal-case">(kosongkan jika tidak mengganti berkas)</span>
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-indigo-400 transition-colors bg-slate-50/50">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="soalpdf" class="relative cursor-pointer font-bold text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Pilih berkas PDF baru</span>
                                            <input id="soalpdf" name="soalpdf" type="file" accept=".pdf" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau seret file ke sini</p>
                                    </div>
                                    <p class="text-xs text-slate-400">Berkas format .pdf maks 10MB</p>
                                </div>
                            </div>
                        </div>

                        {{-- Editor Tugas --}}
                        <div>
                            <label for="myeditorinstance" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Deskripsi, Petunjuk & Pertanyaan Tugas
                            </label>
                            <div class="rounded-2xl overflow-hidden border border-slate-200">
                                <textarea name="myeditorinstance" id="myeditorinstance" rows="10">{{ $tugas->soalteks }}</textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('open-mapel', $mapel->slug) }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-800 transition-all">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center space-x-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 active:scale-[0.99] shadow-lg shadow-indigo-600/30 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
