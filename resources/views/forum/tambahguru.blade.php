<x-main-layout>
    <x-sidebar>
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Header & Navigation -->
            <div class="flex items-center justify-between">
                <a href="{{ route('data-guru') }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Data Guru</span>
                </a>
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                    Form Tenaga Pendidik
                </span>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-800">Tambah Data Guru</h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Daftarkan data akun dan identitas tenaga pengajar ke sistem e-learning institusi.</p>
                </div>

                <div class="p-6 sm:px-8">
                    <x-validation-errors class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700" />

                    <form action="{{ route('submitguru') }}" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- NUPTK --}}
                            <div>
                                <label for="nuptk" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    NUPTK <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="nuptk" id="nuptk" required
                                    placeholder="Contoh: 1234567890123456"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all font-mono" />
                            </div>

                            {{-- NAMA GURU --}}
                            <div>
                                <label for="nameGuru" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Nama Lengkap & Gelar <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="nameGuru" id="nameGuru" required
                                    placeholder="Contoh: Budi Santoso, S.Pd., M.Kom."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>

                            {{-- EMAIL --}}
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Email Guru <span class="text-rose-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" required
                                    placeholder="guru@sekolah.sch.id"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>

                            {{-- GENDER --}}
                            <div>
                                <label for="gender" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Jenis Kelamin <span class="text-rose-500">*</span>
                                </label>
                                <select name="gender" id="gender" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="md:col-span-2">
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Kata Sandi Akun <span class="text-rose-500">*</span>
                                </label>
                                <input type="password" name="password" id="password" required
                                    placeholder="••••••••"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500/20 bg-slate-50/50 focus:bg-white transition-all" />
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('data-guru') }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-800 transition-all">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center space-x-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 active:scale-[0.99] shadow-lg shadow-indigo-600/30 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Simpan Data Guru</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-main-layout>
