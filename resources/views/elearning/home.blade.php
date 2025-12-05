<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>E-Learning | {{ $mapel->name_mapel }}</title>
    <x-sidebar>
        @if (session('success'))
            <div
                class="mb-3 alert alert-success bg-lime-500 italic text-center text-sm sm:text-lg py-2 font-semibold text-white drop-shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="">
            <div class="relative">
                <h1 class="text-2xl ">
                    Mapel : <span class="Capitalize font-bold">{{ $mapel->name_mapel }}</span> <span
                        class="Capitalize font-bold">({{ $mapel->kode_mapel }})</span>
                    || Kelas : <span class="Capitalize font-bold">{{ $mapel->kelas }} - {{ $mapel->jurusan }}</span>
                    || Pengajar : <span class="Capitalize font-bold">{{ $mapel->nameGuru }}</span>
                </h1>
            </div>
        </div>

        <div class="relative mt-2">
            {{-- 1 --}}
            <div class="flex flex-wrap justify-end items-center mb-4 gap-2">
                @if (Auth::user()->roles == 'guru')
                    <a href="{{ route('pertemuan', $mapel->slug) }}"
                        class="bg-lime-500 px-3 py-2 rounded-lg font-bold hover:bg-lime-700 hover:text-white text-xs md:text-base">
                        + Tambah Pertemuan
                    </a>

                    <a href="{{ route('tugas', $mapel->slug) }}"
                        class="bg-lime-500 px-3 py-2 rounded-lg font-bold hover:bg-lime-700 hover:text-white text-xs md:text-base">
                        + Tambah Tugas
                    </a>
                @endif
            </div>

            {{-- Pertemuan --}}
            @foreach ($materi as $data)
                <div class="w-full h-fit mx-auto mt-1 drop-shadow border-2 border-[#000] rounded-lg p-2">
                    <div class="grid grid-cols-1 md:flex">
                        <div class="flex flex-wrap justify-between items-center md:px-3">
                            <div class="max-h-10 md:px-2">
                                <h2 class="">
                                    <span class="text-left text-lg md:text-4xl font-bold">Pertemuan
                                        {{ $data->pertemuan }} :</span>
                                    <a href="{{ route('download-materi', $data->slug) }}">
                                        <span class="ml-2 md:text-2xl text-purple-500">Materi (unduh)</span>
                                    </a>
                                </h2>
                            </div>
                            @if (Auth::user()->roles == 'guru')
                                <div class="flex items-center mt-2 x-space-2">
                                    {{-- edit --}}
                                    <button>
                                        <a href="{{ route('edit-pertemuan', $data->slug) }}">
                                            <img src="{{ asset('Image/Icon/edit.png') }}"
                                                class="w-4 md:w-6 mx-2 grayscale hover:grayscale-0" alt="edit-icon">
                                        </a>
                                    </button>

                                    {{-- delete --}}
                                    <form action="{{ route('delete-pertemuan', $data->slug) }}" method="POST">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('Image/Icon/delete.png') }}"
                                                class="w-4 md:w-6 mx-2 grayscale hover:grayscale-0" alt="detele-icon">
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Tugas --}}
            @foreach ($tugas as $assig)
                <div class="w-full h-fit mx-auto mt-1 drop-shadow border-2 border-[#000] rounded-lg p-2">
                    <div class="grid grid-cols-1 md:flex">
                        <div class="flex flex-wrap justify-between items-center md:px-3">
                            <div class="max-h-10 md:px-2">
                                <h2 class="">
                                    <span class="text-left text-lg md:text-4xl font-bold">Tugas
                                        {{ $assig->tugas }} :</span>
                                    <a href="{{ route('open-tugas', $assig->slug) }}">
                                        <span class="ml-2 md:text-2xl text-green-500">(Klik untuk buka)</span>
                                    </a>
                                </h2>
                            </div>
                            @if (Auth::user()->roles == 'guru')
                                <div class="flex items-center mt-2 x-space-2">
                                    {{-- edit --}}
                                    <button>
                                        <a href="{{ route('edit-tugas', $assig->slug) }}">
                                            <img src="{{ asset('Image/Icon/edit.png') }}"
                                                class="w-4 md:w-6 mx-2 grayscale hover:grayscale-0" alt="edit-icon">
                                        </a>
                                    </button>

                                    {{-- delete --}}
                                    <form action="{{ route('delete-tugas', $assig->slug) }}" method="POST">
                                        @csrf
                                        <button>
                                            <img src="{{ asset('Image/Icon/delete.png') }}"
                                                class="w-4 md:w-6 mx-2 grayscale hover:grayscale-0" alt="detele-icon">
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-sidebar>
</main-layout>
