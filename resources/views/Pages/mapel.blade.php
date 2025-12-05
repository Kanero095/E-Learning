<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Mata Pelajaran</title>
    <x-sidebar>
        <div>
            @if (session('success'))
                <div
                    class="mb-3 alert alert-success bg-lime-500 italic text-center text-sm sm:text-lg py-2 font-semibold text-white drop-shadow">
                    {{ session('success') }}
                </div>
            @endif

            {{-- 1 --}}
            <div class="flex flex-wrap justify-between items-center mb-4 gap-2">
                @if (Auth::user()->roles == 'admin')
                    <a href="{{ route('tambah-mapel') }}"
                        class="bg-lime-500 px-3 py-2 rounded-lg font-bold hover:bg-lime-700 hover:text-white text-xs md:text-base">
                        + Tambah Data
                    </a>
                @endif

                <div>
                    <form method="GET" action="#" class="mb-4" autocomplete="off">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama atau NUPTK Guru..."
                            class="border rounded px-3 py-1 text-sm w-64 justify-right">
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Cari</button>
                    </form>

                </div>
            </div>


            {{-- 2 --}}
            <table class="table w-full mt-4">
                <thead>
                    <tr class="border-y">
                        <th class="w-10 text-xs md:text-base">
                            No
                        </th>
                        <th class="md:w-40 text-xs md:text-base">
                            Kode Mapel
                        </th>
                        <th class="text-xs md:text-base">
                            Nama Mapel
                        </th>
                        <th class="md:w-20 text-xs md:text-base px-1">
                            Kelas
                        </th>
                        <th class="md:w-40 text-xs md:text-base">
                            NUPTK
                        </th>
                        <th class="md:w-40 text-xs md:text-base px-1">
                            Nama Pengajar
                        </th>
                        <th class="text-xs md:text-base px-1">
                            Email Pengajar
                        </th>
                        <th class="w-10 md:w-40 text-xs md:text-base px-2">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- data --}}
                    @foreach ($mapel as $data)
                        @if ($data->gender == 'Laki-Laki')
                            <tr class="border-b hover:font-bold bg-gray-200">
                                <td class="text-center text-xs md:text-base">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-1 text-center text-[10px] md:text-lg">
                                    {{ $data->kode_mapel }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-justify">
                                    {{ $data->name_mapel }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-justify">
                                    {{ $data->kelas }}
                                </td>
                                <td class="px-1 text-center text-[10px] md:text-lg">
                                    {{ $data->nuptk }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-justify">
                                    {{ $data->nameGuru }}
                                </td>
                                <td class="text-center px-1 text-xs md:text-base">
                                    {{ $data->email }}
                                </td>
                                <td class="md:justify-center py-2 md:flex">

                                    @if (Auth::user()->roles == 'admin')
                                        {{-- edit --}}
                                        <button>
                                            <a href="{{ route('edit-mapel', $data->slug) }}">
                                                <img src="{{ asset('Image/Icon/edit.png') }}"
                                                    class="w-4 md:w-6 mx-1 grayscale hover:grayscale-0" alt="edit-icon">
                                            </a>
                                        </button>

                                        {{-- delete --}}
                                        <form action="{{ route('delete-mapel', $data->slug) }}" method="POST">
                                            @csrf
                                            <button>
                                                <img src="{{ asset('Image/Icon/delete.png') }}"
                                                    class="w-4 md:w-6 mx-1 grayscale hover:grayscale-0"
                                                    alt="detele-icon">
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr class="border-b hover:font-bold bg-white">
                                <td class="text-center text-xs md:text-base">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-1 text-center text-[10px] md:text-lg">
                                    {{ $data->kode_mapel }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-justify">
                                    {{ $data->name_mapel }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-center">
                                    {{ $data->kelas }}
                                </td>
                                <td class="px-1 text-center text-[10px] md:text-lg">
                                    {{ $data->nuptk }}
                                </td>
                                <td class="px-1 text-xs md:text-base text-justify">
                                    {{ $data->nameGuru }}
                                </td>
                                <td class="text-center px-1 text-xs md:text-base">
                                    {{ $data->email }}
                                </td>
                                <td class="md:justify-center py-2 md:flex">

                                    @if (Auth::user()->roles == 'admin')
                                        {{-- edit --}}
                                        <button>
                                            <a href="{{ route('edit-mapel', $data->slug) }}">
                                                <img src="{{ asset('Image/Icon/edit.png') }}"
                                                    class="w-4 md:w-6 mx-1 grayscale hover:grayscale-0" alt="edit-icon">
                                            </a>
                                        </button>

                                        {{-- delete --}}
                                        <form action="{{ route('delete-mapel', $data->slug) }}" method="POST">
                                            @csrf
                                            <button>
                                                <img src="{{ asset('Image/Icon/delete.png') }}"
                                                    class="w-4 md:w-6 mx-1 grayscale hover:grayscale-0"
                                                    alt="detele-icon">
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <div class="paginate m-auto mt-1">
                    {{-- paginate --}}
                    {{ $mapel->links() }}
                </div>
            </table>
            <div class="paginate m-auto mt-1">
                {{-- paginate --}}
                {{ $mapel->links() }}
            </div>
        </div>
    </x-sidebar>
</main-layout>
