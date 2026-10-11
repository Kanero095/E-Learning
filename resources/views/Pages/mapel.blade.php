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
                        <span>Kurikulum & Pelajaran</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Mata Pelajaran
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Daftar mata pelajaran aktif, kode kurikulum, alokasi kelas, dan pengajar bersangkutan.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    @if (Auth::user()->roles == 'admin')
                        <a href="{{ route('tambah-mapel') }}"
                           class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-600/30 transition">
                            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            + Tambah Mapel
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Toolbar Info -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="text-xs font-semibold text-slate-500">
                Total Mata Pelajaran: <strong class="text-slate-800">{{ $mapel->total() ?? count($mapel) }}</strong>
            </div>
        </div>

        <!-- Academic Table Container -->
        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[11px] border-b border-slate-200">
                        <tr>
                            <th class="px-4 py-3.5 text-center w-12">No</th>
                            <th class="px-4 py-3.5 w-32">Kode Mapel</th>
                            <th class="px-4 py-3.5">Nama Mata Pelajaran</th>
                            <th class="px-4 py-3.5 text-center w-24">Kelas</th>
                            <th class="px-4 py-3.5 w-36">NUPTK</th>
                            <th class="px-4 py-3.5">Nama Pengajar</th>
                            <th class="px-4 py-3.5">Email Pengajar</th>
                            <th class="px-4 py-3.5 text-center w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200/80">
                        @forelse ($mapel as $data)
                            <tr class="hover:bg-indigo-50/20 transition {{ $data->gender == 'Laki-Laki' ? 'bg-white' : 'bg-slate-50/40' }}">
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md font-mono font-bold text-xs bg-slate-100 text-slate-800 border border-slate-200">
                                        {{ $data->kode_mapel }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 font-bold text-slate-900">
                                    {{ $data->name_mapel }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200/60">
                                        {{ $data->kelas }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 font-mono text-slate-700">
                                    {{ $data->nuptk }}
                                </td>
                                <td class="px-4 py-3.5 font-semibold text-slate-900">
                                    {{ $data->nameGuru }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-600">
                                    {{ $data->email }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if (Auth::user()->roles == 'admin')
                                        <div class="flex items-center justify-center space-x-1.5">
                                            <!-- Edit Button -->
                                            <a href="{{ route('edit-mapel', $data->slug) }}" 
                                               class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-amber-50 transition"
                                               title="Edit Mapel">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <!-- Delete Form -->
                                            <form action="{{ route('delete-mapel', $data->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')">
                                                @csrf
                                                <button type="submit" 
                                                        class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition"
                                                        title="Hapus Mapel">
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
                                <td colspan="8" class="text-center py-12 text-slate-500 italic">
                                    Tidak ada mata pelajaran yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Single Pagination Container -->
            @if(method_exists($mapel, 'links'))
                <div class="px-6 py-4 border-t border-slate-100 flex justify-center">
                    {{ $mapel->links() }}
                </div>
            @endif
        </div>
    </x-sidebar>
</x-main-layout>
