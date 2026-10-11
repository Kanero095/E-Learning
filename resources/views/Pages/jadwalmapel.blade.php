<x-main-layout>
    <x-sidebar>
        <!-- Page Header -->
        <div class="mb-8 pb-6 border-b border-slate-200">
            <div class="inline-flex items-center space-x-2 text-xs font-semibold text-indigo-600 uppercase tracking-wider mb-1">
                <span>Agenda Akademik</span>
                <span>•</span>
                <span>Jam Belajar</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Jadwal Pelajaran Mingguan
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Jadwal kegiatan belajar mengajar untuk seluruh tingkatan kelas dan program keahlian (Senin s/d Jumat).
            </p>
        </div>

        <!-- Timetable Groups -->
        <div class="space-y-10">
            @forelse ($jadwal as $kelas => $jurusanList)
                @foreach ($jurusanList as $jurusan => $hariList)
                    <div class="rounded-3xl bg-white border border-slate-200/90 shadow-sm overflow-hidden">
                        <!-- Card Header -->
                        <div class="px-6 py-4 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <div class="flex items-center space-x-3">
                                <span class="w-8 h-8 rounded-xl bg-indigo-500 text-white font-extrabold text-xs flex items-center justify-center shrink-0">
                                    {{ $kelas }}
                                </span>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-white">
                                        Kelas {{ $kelas }} — {{ $jurusan }}
                                    </h3>
                                    <p class="text-[11px] text-slate-300">Tahun Ajaran 2024/2025 • Semester Ganjil</p>
                                </div>
                            </div>
                            <span class="text-xs font-semibold text-indigo-200 bg-white/10 px-3 py-1 rounded-full self-start sm:self-auto">
                                5 Hari Belajar
                            </span>
                        </div>

                        <!-- Schedule Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-center text-xs">
                                <thead class="bg-slate-100 text-slate-700 font-bold uppercase tracking-wider text-[11px] border-b border-slate-200">
                                    <tr>
                                        <th class="px-4 py-3.5 w-1/5 border-r border-slate-200/80">Senin</th>
                                        <th class="px-4 py-3.5 w-1/5 border-r border-slate-200/80">Selasa</th>
                                        <th class="px-4 py-3.5 w-1/5 border-r border-slate-200/80">Rabu</th>
                                        <th class="px-4 py-3.5 w-1/5 border-r border-slate-200/80">Kamis</th>
                                        <th class="px-4 py-3.5 w-1/5">Jumat</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/70">
                                    @php
                                        $max = max(
                                            $hariList['Senin']->count(),
                                            $hariList['Selasa']->count(),
                                            $hariList['Rabu']->count(),
                                            $hariList['Kamis']->count(),
                                            $hariList['Jumat']->count(),
                                        );
                                    @endphp

                                    @if ($max > 0)
                                        @for ($i = 0; $i < $max; $i++)
                                            <tr class="hover:bg-indigo-50/20 transition">
                                                <!-- Senin -->
                                                <td class="px-3 py-3 border-r border-slate-200/70 align-top">
                                                    @if(isset($hariList['Senin'][$i]->name_mapel))
                                                        <div class="p-2.5 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-900 font-bold text-xs shadow-xs">
                                                            {{ $hariList['Senin'][$i]->name_mapel }}
                                                        </div>
                                                    @else
                                                        <span class="text-slate-300 font-mono">—</span>
                                                    @endif
                                                </td>

                                                <!-- Selasa -->
                                                <td class="px-3 py-3 border-r border-slate-200/70 align-top">
                                                    @if(isset($hariList['Selasa'][$i]->name_mapel))
                                                        <div class="p-2.5 rounded-xl bg-blue-50 border border-blue-100 text-blue-900 font-bold text-xs shadow-xs">
                                                            {{ $hariList['Selasa'][$i]->name_mapel }}
                                                        </div>
                                                    @else
                                                        <span class="text-slate-300 font-mono">—</span>
                                                    @endif
                                                </td>

                                                <!-- Rabu -->
                                                <td class="px-3 py-3 border-r border-slate-200/70 align-top">
                                                    @if(isset($hariList['Rabu'][$i]->name_mapel))
                                                        <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-900 font-bold text-xs shadow-xs">
                                                            {{ $hariList['Rabu'][$i]->name_mapel }}
                                                        </div>
                                                    @else
                                                        <span class="text-slate-300 font-mono">—</span>
                                                    @endif
                                                </td>

                                                <!-- Kamis -->
                                                <td class="px-3 py-3 border-r border-slate-200/70 align-top">
                                                    @if(isset($hariList['Kamis'][$i]->name_mapel))
                                                        <div class="p-2.5 rounded-xl bg-amber-50 border border-amber-100 text-amber-900 font-bold text-xs shadow-xs">
                                                            {{ $hariList['Kamis'][$i]->name_mapel }}
                                                        </div>
                                                    @else
                                                        <span class="text-slate-300 font-mono">—</span>
                                                    @endif
                                                </td>

                                                <!-- Jumat -->
                                                <td class="px-3 py-3 align-top">
                                                    @if(isset($hariList['Jumat'][$i]->name_mapel))
                                                        <div class="p-2.5 rounded-xl bg-violet-50 border border-violet-100 text-violet-900 font-bold text-xs shadow-xs">
                                                            {{ $hariList['Jumat'][$i]->name_mapel }}
                                                        </div>
                                                    @else
                                                        <span class="text-slate-300 font-mono">—</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endfor
                                    @else
                                        <tr>
                                            <td colspan="5" class="py-8 text-center text-slate-400 italic">
                                                Jadwal belum ditentukan untuk rombel ini.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="text-center py-16 bg-white rounded-3xl border border-slate-200">
                    <p class="text-sm font-semibold text-slate-500">Tidak ada data jadwal yang ditemukan.</p>
                </div>
            @endforelse
        </div>
    </x-sidebar>
</x-main-layout>
