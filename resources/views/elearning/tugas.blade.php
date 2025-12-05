<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style>
    #soal-content ol {
        list-style-type: decimal;
        margin-left: 1rem;
    }

    #soal-content ul {
        list-style-type: disc;
        margin-left: 1rem;
    }

    .soal-content p {
        margin: 0.5rem 0;
    }
</style>

<main-layout>
    <title>Tugas {{ $tugas->tugas }} {{ $tugas->name_mapel }} | E-Learning</title>
    <x-sidebar>
        @if (session('success'))
            <div
                class="mb-3 alert alert-success bg-lime-500 italic text-center text-sm sm:text-lg py-2 font-semibold text-white drop-shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="">
            <div class="relative">
                <h1 class="text-2xl">
                    <a href="{{ route('open-mapel', $mapel->slug) }}"
                        class="btn btn-secondary py-1 px-1 bg-red-600 mb-5 mr-1 rounded-lg text-black font-bold hover:text-white hover:bg-red-700">
                        Back
                    </a>
                    || Mapel : <span class="Capitalize font-bold">{{ $tugas->name_mapel }}</span> <span
                        class="Capitalize font-bold">({{ $tugas->kode_mapel }})</span>
                    || Tugas : <span class="Capitalize font-bold">{{ $tugas->tugas }}</span>
                </h1>
            </div>
        </div>

        <div>
            {{-- table tugas --}}
            <table class="table w-full mt-4">
                <tbody>
                    <tr class="border-y">
                        <th class="w-5 bg-gray-300 text-xs md:text-base">
                            Soal
                        </th>
                        <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                            @if ($tugas->soalpdf == true)
                                <a href="{{ route('download-tugas', $tugas->slug) }}">
                                    <span class="text-purple-500">(Klik unduh File Tugas)</span>
                                </a>
                            @else
                                <div class="prose max-w-none" id="soal-content">
                                    {!! $tugas->soalteks !!}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr class="border-y">
                        <th class="w-5 bg-gray-300 text-xs md:text-base">
                            Dibuka (Opened)
                        </th>
                        <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                            {{ $tugas->opened }}
                        </td>
                    </tr>
                    <tr class="border-y">
                        <th class="w-5 bg-gray-300 text-xs md:text-base">
                            Batas (Due)
                        </th>
                        <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                            {{ $tugas->due }}
                        </td>
                    </tr>
                    <tr class="border-y">
                        <th class="w-5 bg-gray-300 text-xs md:text-base">
                            Sisa Waktu
                        </th>
                        <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                            @php
                                $diffInSeconds = now()->diffInSeconds($tugas->due);

                                $days = floor($diffInSeconds / 86400);
                                $hours = floor(($diffInSeconds % 86400) / 3600);
                                $minutes = floor(($diffInSeconds % 3600) / 60);
                            @endphp

                            {{ $days > 0 ? $days . ' hari ' : '' }}
                            {{ $hours > 0 ? $hours . ' jam ' : '' }}
                            {{ $minutes > 0 ? $minutes . ' menit' : '' }}
                            {{ $diffInSeconds > 0 ? $diffInSeconds % 60 . ' Detik' : '' }}
                            @if ($days <= 0 && $hours <= 0 && $minutes <= 0)
                                {{ $days < 0 ? $days + 1 . ' hari ' : '' }}
                                {{ $hours < 0 ? $hours + 1 . ' jam ' : '' }}
                                {{ $minutes < 0 ? $minutes + 1 . ' menit' : '' }}
                                {{ $diffInSeconds < 0 ? $diffInSeconds % 60 . ' Detik' : '' }}
                            @endif
                        </td>
                    </tr>
                    @if (Auth::user()->roles == 'siswa')
                        <tr class="border-y">
                            <th class="w-5 bg-gray-300 text-xs md:text-base">
                                Jawaban
                            </th>
                            <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                                @if (!is_null(optional($jawabanSiswa)->jawabanpdf) && $jawabanSiswa->slugTugas == $tugas->slug)
                                    <a href="{{ route('download-jawaban', $jawabanSiswa->slugJawaban) }}">
                                        <span class="text-purple-500">(Klik unduh File Jawaban)</span>
                                    </a>
                                    @if (now() <= $tugas->due)
                                        <a href="{{ route('edit-jawaban', $slug = $jawabanSiswa->slugJawaban) }}"
                                            class="text-sky-700">
                                            (Edit Jawaban)
                                        </a>
                                    @endif
                                @elseif (!is_null(optional($jawabanSiswa)->jawabanteks) && $jawabanSiswa->slugTugas == $tugas->slug)
                                    @if (now() <= $tugas->due)
                                        <a href="{{ route('edit-jawaban', $slug = $jawabanSiswa->slugJawaban) }}"
                                            class="text-sky-700">
                                            (Edit Jawaban)
                                        </a>
                                        <br>
                                    @endif
                                    {!! $jawabanSiswa->jawabanteks !!}
                                @elseif(
                                    !is_null(optional($jawabanSiswa)->jawabanpdf) == false &&
                                        !is_null(optional($jawabanSiswa)->jawabanteks) == false &&
                                        $days >= 0 &&
                                        $hours >= 0 &&
                                        $minutes >= 0 &&
                                        $diffInSeconds >= 0)
                                    <a href="{{ route('jawab', $tugas->slug) }}" class="text-yellow-700">
                                        (Upload Jawaban)
                                    </a>
                                @else
                                    <span class="italic text-red-700">Waktu upload telah habis!!!</span>
                                @endif
                            </td>
                        </tr>
                        @if (!is_null(optional($jawabanSiswa)->jawabanpdf) || !is_null(optional($jawabanSiswa)->jawabanteks))
                            <tr class="border-y">
                                <th class="w-5 bg-gray-300 text-xs md:text-base">
                                    Pengumpulan
                                </th>
                                <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                                    {{ $jawabanSiswa->pengumpulan }}
                                </td>
                            </tr>
                        @endif
                        <tr class="border-y">
                            <th class="w-5 bg-gray-300 text-xs md:text-base">
                                Nilai (Grade)
                            </th>
                            <td class="md:w-40 text-xs md:text-base px-2 text-justify">
                                @if (!is_null(optional($jawabanSiswa)->nilai))
                                    {{ $jawabanSiswa->nilai }}
                                @elseif (
                                    !is_null(optional($jawabanSiswa)->nilai) ||
                                        !is_null(optional($jawabanSiswa)->jawabanpdf) ||
                                        !is_null(optional($jawabanSiswa)->jawabanteks))
                                    Belum Dinilai
                                @else
                                    <span>Anda belum upload jawaban!!!</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{-- table tugas ke-2 (jawaban) --}}
            @if (Auth::user()->roles == 'guru')
                <table class="table w-full mt-6">
                    <thead>
                        <tr class="border-y bg-gray-200">
                            <th class="w-10 text-xs md:text-base">
                                No
                            </th>
                            <th class="md:w-40 text-xs md:text-base">
                                NIS
                            </th>
                            <th class="text-xs md:text-base">
                                Nama Siswa
                            </th>
                            <th class="text-xs md:text-base px-1">
                                Kelas
                            </th>
                            <th class="md:w-40 text-xs md:text-base px-1">
                                Jawaban
                            </th>
                            <th class="md:w-40 text-xs md:text-base px-1">
                                Waktu Pengumpulan
                            </th>
                            <th class="md:w-40 text-xs md:text-base px-1">
                                Nilai
                            </th>
                            <th class="w-10 md:w-40 text-xs md:text-base px-2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Alljawaban as $data)
                            <tr class="border-y">
                                <td class="w-10 text-xs md:text-base text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="md:w-40 text-xs md:text-base text-center">
                                    {{ $data->nis }}
                                </td>
                                <td class="text-xs md:text-base">
                                    {{ $data->nameSiswa }}
                                </td>
                                <td class="text-xs md:text-base px-1 text-center">
                                    {{ $data->kelas }}
                                </td>
                                <td class="md:w-40 text-xs text-justify md:text-base px-1">
                                    @if (!is_null(optional($data)->jawabanpdf) && $data->slugTugas == $tugas->slug)
                                        <a href="{{ route('download-jawaban', $data->slugJawaban) }}">
                                            <span class="text-purple-500">(Klik unduh File Jawaban)</span>
                                        </a>
                                    @elseif(!is_null(optional($data)->jawabanteks) && $data->slugTugas == $tugas->slug)
                                        {!! $data->jawabanteks !!}
                                    @endif
                                </td>
                                <td class="md:w-40 text-xs md:text-base px-1">
                                    {{ $data->pengumpulan }}
                                </td>
                                <td class="md:w-40 text-xs md:text-base px-1 text-center">
                                    @if (!is_null(optional($data)->nilai))
                                        {{ $data->nilai }}
                                    @elseif (!is_null(optional($data)->nilai) || !is_null(optional($data)->jawabanpdf) || !is_null(optional($data)->jawabanteks))
                                        Belum anda nilai!!!
                                    @endif
                                </td>
                                <td class="w-10 md:w-40 text-xs md:text-base px-2 text-center">
                                    <button>
                                        <a href="{{ route('edit-nilai', $data->slugJawaban) }}">
                                            <img src="{{ asset('Image/Icon/edit.png') }}"
                                                class="w-4 md:w-6 mx-1 grayscale hover:grayscale-0" alt="edit-icon">
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </x-sidebar>
</main-layout>
