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

        <!-- Page Header & Action Bar -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <div class="inline-flex items-center space-x-2 text-xs font-semibold text-indigo-600 uppercase tracking-wider mb-1">
                        <span>Master Data</span>
                        <span>•</span>
                        <span>Bimbingan & Kelas</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Data Wali Kelas
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Pemetaan guru pengampu wali kelas untuk masing-masing rombel dan program keahlian.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    @if (Auth::user()->roles == 'admin')
                        <a href="{{ route('tambahwalkel') }}"
                           class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-600/30 transition">
                            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            + Tambah Wali Kelas
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Filter & Search Toolbar -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="text-xs font-semibold text-slate-500">
                Total Wali Kelas: <strong class="text-slate-800">{{ $guru->total() ?? count($guru) }}</strong>
            </div>

            <form method="GET" action="{{ route('data-walikelas') }}" class="flex items-center space-x-2" autocomplete="off">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari nama atau NUPTK Guru..."
                           class="pl-9 pr-4 py-2 rounded-xl text-xs bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 w-64 transition">
                </div>
                <button type="submit" 
                        class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-900 hover:bg-slate-800 text-white transition">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('data-walikelas') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800 underline">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Academic Table Container -->
        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[11px] border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-3.5 text-center w-12">No</th>
                            <th class="px-4 py-3.5 w-36">NUPTK</th>
                            <th class="px-4 py-3.5">Nama Guru</th>
                            @if (Auth::user()->roles == 'admin')
                                <th class="px-4 py-3.5">Email</th>
                            @endif
                            <th class="px-4 py-3.5 text-center w-28">Gender</th>
                            <th class="px-4 py-3.5 text-center">Kelas & Jurusan</th>
                            <th class="px-4 py-3.5 text-center w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200/80">
                        @forelse ($guru as $data)
                            <tr class="hover:bg-indigo-50/20 transition {{ $data->gender == 'Laki-Laki' ? 'bg-white' : 'bg-slate-50/40' }}">
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3.5 font-mono font-semibold text-slate-800">
                                    {{ $data->nuptk }}
                                </td>
                                <td class="px-4 py-3.5 font-bold text-slate-900">
                                    <div class="flex items-center space-x-2.5">
                                        <div class="w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs shrink-0">
                                            {{ strtoupper(substr($data->nameGuru ?? 'G', 0, 1)) }}
                                        </div>
                                        <span>{{ $data->nameGuru }}</span>
                                    </div>
                                </td>
                                @if (Auth::user()->roles == 'admin')
                                    <td class="px-4 py-3.5 text-slate-600">
                                        {{ $data->email }}
                                    </td>
                                @endif
                                <td class="px-4 py-3.5 text-center">
                                    @if($data->gender == 'Laki-Laki')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                            Laki-Laki
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                            Perempuan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200/60">
                                        {{ $data->kelas }} — {{ $data->jurusan }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if (Auth::user()->roles == 'admin')
                                        <div class="flex items-center justify-center space-x-1.5">
                                            <!-- Edit Button -->
                                            <a href="{{ route('edit-walkel', $data->slug) }}" 
                                               class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition"
                                               title="Edit Wali Kelas">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <!-- Delete Form -->
                                            <form action="{{ route('delete-walkel', $data->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data wali kelas ini?')">
                                                @csrf
                                                <button type="submit" 
                                                        class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition"
                                                        title="Hapus Wali Kelas">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::user()->roles == 'admin' ? 7 : 6 }}" class="text-center py-12 text-slate-500 italic">
                                    Tidak ada data wali kelas yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Single Pagination Container -->
            @if(method_exists($guru, 'links'))
                <div class="px-6 py-4 border-t border-slate-100 flex justify-center">
                    {{ $guru->links() }}
                </div>
            @endif
        </div>
    </x-sidebar>
</x-main-layout>
