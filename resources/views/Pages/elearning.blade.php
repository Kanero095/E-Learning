<x-main-layout>
    <x-sidebar>
        <!-- Page Header & Greeting -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <div class="inline-flex items-center space-x-2 text-xs font-semibold text-indigo-600 uppercase tracking-wider mb-1">
                        <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                        <span>Ruang Kelas Digital</span>
                    </div>
                    
                    @if (Auth::user()->roles == 'siswa')
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            Selamat Datang, <span class="capitalize text-indigo-600">{{ Auth::user()->name }}</span>
                        </h1>
                        <p class="text-sm text-slate-500 mt-1">
                            Pilih mata pelajaran di bawah untuk mengunduh modul materi dan menyelesaikan lembar tugas.
                        </p>
                    @elseif(Auth::user()->roles == 'guru')
                        @if (isset($guru) && $guru->gender == 'Laki-Laki')
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                                Selamat Datang, Bapak <span class="capitalize text-indigo-600">{{ Auth::user()->name }}</span>
                            </h1>
                        @elseif(isset($guru) && $guru->gender == 'Perempuan')
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                                Selamat Datang, Ibu <span class="capitalize text-indigo-600">{{ Auth::user()->name }}</span>
                            </h1>
                        @else
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                                Selamat Datang, <span class="capitalize text-indigo-600">{{ Auth::user()->name }}</span>
                            </h1>
                        @endif
                        <p class="text-sm text-slate-500 mt-1">
                            Kelola pertemuan, materi digital, dan penilaian tugas siswa untuk mata pelajaran yang Anda ampu.
                        </p>
                    @endif
                </div>

                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200/80">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Mata Pelajaran Aktif
                    </span>
                </div>
            </div>
        </div>

        <!-- Course Cards Grid -->
        <div class="relative">
            @if (Auth::user()->roles == 'siswa' || Auth::user()->roles == 'guru')
                @if (count($mapel) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($mapel as $data)
                            <div class="group flex flex-col bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                                <a href="{{ route('open-mapel', $data->slug) }}" class="flex-1 flex flex-col">
                                    <!-- Banner Image with Course Code Badge -->
                                    <div class="relative h-40 bg-slate-900 overflow-hidden">
                                        <img src="{{ asset('image/png/' . $data->id . '.png') }}"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90"
                                             alt="{{ $data->name_mapel }}"
                                             onerror="this.src='{{ asset('Image/Logo/logo-smk.png') }}'; this.className='w-full h-full object-contain p-6 bg-slate-800 opacity-80';">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                                        
                                        <!-- Top Badge: Code -->
                                        <div class="absolute top-3 left-3">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-white/95 text-slate-800 shadow-sm backdrop-blur-md">
                                                {{ $data->kode_mapel }}
                                            </span>
                                        </div>

                                        @if(isset($data->kelas))
                                        <div class="absolute top-3 right-3">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-semibold bg-indigo-600/90 text-white backdrop-blur-sm">
                                                Kelas {{ $data->kelas }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Content Body -->
                                    <div class="p-5 flex-1 flex flex-col justify-between">
                                        <div>
                                            <h2 class="text-base font-bold text-slate-900 group-hover:text-indigo-600 transition line-clamp-2 leading-snug">
                                                {{ $data->name_mapel }}
                                            </h2>
                                            
                                            <!-- Teacher Info -->
                                            <div class="flex items-center mt-3 pt-3 border-t border-slate-100 text-xs text-slate-600">
                                                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 mr-2 shrink-0 border border-slate-200">
                                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                                <span class="truncate font-medium">{{ $data->nameGuru }}</span>
                                            </div>
                                        </div>

                                        <!-- Card Footer CTA -->
                                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-indigo-600 group-hover:text-indigo-700">
                                            <span>Buka Pembelajaran</span>
                                            <div class="w-6 h-6 rounded-full bg-indigo-50 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition">
                                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if (method_exists($mapel, 'links'))
                        <div class="mt-8 flex justify-center">
                            {{ $mapel->links() }}
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16 px-4 bg-white rounded-3xl border border-slate-200">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-800">Belum Ada Mata Pelajaran</h3>
                        <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">
                            Mata pelajaran untuk kelas dan jurusan Anda belum didaftarkan atau sedang dalam persiapan kurikulum.
                        </p>
                    </div>
                @endif
            @else
                <div class="p-6 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800">
                    <p class="font-bold text-base">{{ Auth::user()->name }},</p>
                    <p class="text-sm mt-1">Anda tidak memiliki akses di halaman ini!</p>
                </div>
            @endif
        </div>
    </x-sidebar>
</x-main-layout>
