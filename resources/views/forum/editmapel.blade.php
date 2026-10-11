<x-main-layout>
    <x-sidebar>
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Header & Navigation -->
            <div class="flex items-center justify-between">
                <a href="{{ route('mapel') }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Kurikulum Mapel</span>
                </a>
                <span class="text-xs font-semibold text-amber-700 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Mode Sunting Mata Pelajaran
                </span>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-800">Edit Mata Pelajaran</h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Perbarui kurikulum mata pelajaran {{ $mapel->name_mapel }} dan jadwal pengajarannya.</p>
                </div>

                <div class="p-6 sm:px-8">
                    <x-validation-errors class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700" />

                    <form action="{{ route('update-mapel', $mapel->slug) }}" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- KODE MAPEL --}}
                            <div>
                                <label for="kode_mapel" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Kode Mata Pelajaran <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="kode_mapel" id="kode_mapel" required value="{{ $mapel->kode_mapel }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all font-mono" />
                            </div>

                            {{-- NAMA MAPEL --}}
                            <div>
                                <label for="name_mapel" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Nama Mata Pelajaran <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="name_mapel" id="name_mapel" required value="{{ $mapel->name_mapel }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>

                            {{-- HARI --}}
                            <div>
                                <label for="hari" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Hari Pelaksanaan <span class="text-rose-500">*</span>
                                </label>
                                <select name="hari" id="hari" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all">
                                    <option value="{{ $mapel->jadwal }}">{{ $mapel->jadwal }} (Jadwal Saat Ini)</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>

                            {{-- KELAS --}}
                            <div>
                                <label for="kelas" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Tingkat Kelas <span class="text-rose-500">*</span>
                                </label>
                                <select name="kelas" id="kelas" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all">
                                    <option value="{{ $mapel->kelas }}">{{ $mapel->kelas }} (Saat Ini)</option>
                                    <option value="X">Kelas X</option>
                                    <option value="XI">Kelas XI</option>
                                    <option value="XII">Kelas XII</option>
                                </select>
                            </div>

                            {{-- JURUSAN --}}
                            <div>
                                <label for="jurusan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Program Keahlian / Jurusan <span class="text-rose-500">*</span>
                                </label>
                                <select name="jurusan" id="jurusan" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all">
                                    <option value="{{ $mapel->jurusan }}">{{ $mapel->jurusan }} (Saat Ini)</option>
                                    <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                                    <option value="Teknik dan Bisnis Sepeda Motor (TBSM)">Teknik dan Bisnis Sepeda Motor (TBSM)</option>
                                    <option value="Otomatisasi dan Tata Kelola Perkantoran (OTKP)">Otomatisasi dan Tata Kelola Perkantoran (OTKP)</option>
                                </select>
                            </div>

                            {{-- GURU PENGAMPU / NUPTK --}}
                            <div>
                                <label for="nuptk" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Guru Pengampu Mata Pelajaran <span class="text-rose-500">*</span>
                                </label>
                                <select name="nuptk" id="nuptk" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all">
                                    <option value="{{ $mapel->nuptk }}">{{ $mapel->nuptk }} - {{ $mapel->nameGuru }} (Saat Ini)</option>
                                    @foreach ($guru as $data)
                                        <option value="{{ $data->nuptk }}">{{ $data->nuptk }} - {{ $data->nameGuru }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('mapel') }}"
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
