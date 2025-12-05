<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Jadwal Mapel | E-Learning</title>
    <x-sidebar>
        <div class="">
            @foreach ($jadwal as $kelas => $jurusanList)
                @foreach ($jurusanList as $jurusan => $hariList)
                    {{-- <h2>{{ $kelas }} - {{ $jurusan }}</h2> --}}
                    <table class="table w-[1000px] mt-4">
                        <caption class="caption-top font-bold mb-2 text-xl">
                            JADWAL MAPEL KELAS {{ $kelas }}
                            <br>
                            {{ $jurusan }}
                        </caption>

                        <thead>
                            <tr class="border-y bg-gray-300">
                                <th class="w-auto text-xs md:text-lg">Senin</th>
                                <th class="w-auto text-xs md:text-lg">Selasa</th>
                                <th class="w-auto text-xs md:text-lg">Rabu</th>
                                <th class="w-auto text-xs md:text-lg">Kamis</th>
                                <th class="w-auto text-xs md:text-lg">Jumat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $max = max(
                                    $hariList['Senin']->count(),
                                    $hariList['Selasa']->count(),
                                    $hariList['Rabu']->count(),
                                    $hariList['Kamis']->count(),
                                    $hariList['Jumat']->count(),
                                );
                            @endphp

                            @for ($i = 0; $i < $max; $i++)
                                <tr class="border-b">
                                    <td class="px-1 text-center text-[10px] md:text-lg">
                                        {{ $hariList['Senin'][$i]->name_mapel ?? '' }}</td>
                                    <td class="px-1 text-center text-[10px] md:text-lg">
                                        {{ $hariList['Selasa'][$i]->name_mapel ?? '' }}</td>
                                    <td class="px-1 text-center text-[10px] md:text-lg">
                                        {{ $hariList['Rabu'][$i]->name_mapel ?? '' }}</td>
                                    <td class="px-1 text-center text-[10px] md:text-lg">
                                        {{ $hariList['Kamis'][$i]->name_mapel ?? '' }}</td>
                                    <td class="px-1 text-center text-[10px] md:text-lg">
                                        {{ $hariList['Jumat'][$i]->name_mapel ?? '' }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                @endforeach
            @endforeach
        </div>
    </x-sidebar>
</main-layout>
