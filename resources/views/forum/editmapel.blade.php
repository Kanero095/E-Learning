<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Edit Mata Pelajaran</title>
    <x-sidebar>
        <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
        <form action="{{ route('update-mapel', $mapel->slug) }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="relative z-0 w-full mb-2 text-center bg-sky-400 py-3">
                <p class="text-white text-2xl font-bold hover:text-black">
                    Edit Data Mapel
                </p>
            </div>
            <div class="">
                {{-- kode mapel --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="kode_mapel" id="kode_mapel"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $mapel->kode_mapel }}" required />
                    <label for="kode_mapel"
                        class="peer-focus:font-medium absolute pl-1 text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Kode Mata Pelajaran
                    </label>
                </div>
            </div>

            <div class="">
                {{-- NAMA MAPEL --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name_mapel" id="name_mapel"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $mapel->name_mapel }}" required />
                    <label for="name_mapel"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nama Mata Pelajaran*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- jadwal --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="hari" id="hari"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="{{ $mapel->jadwal }}">{{ $mapel->jadwal }} (Jadwal saat ini)</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- kelas --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="kelas" id="kelas"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="{{ $mapel->kelas }}">{{ $mapel->kelas }} (sekarang)</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Jurusan --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="jurusan" id="jurusan"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="{{ $mapel->jurusan }}">{{ $mapel->jurusan }} (sekarang)</option>
                        <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                        <option value="Teknik dan Bisnis Sepeda Motor (TBSM)">Teknik dan Bisnis Sepeda Motor (TBSM)
                        </option>
                        <option value="Otomatisasi dan Tata Kelola Perkantoran (OTKP)">Otomatisasi dan Tata Kelola
                            Perkantoran (OTKP)
                        </option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- NUPTK --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="nuptk" id="nuptk"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="{{ $mapel->nuptk }}">{{ $mapel->nuptk }} - {{ $mapel->nameGuru }} (sekarang)
                        </option>
                        @foreach ($guru as $data)
                            <option value="{{ $data->nuptk }}">{{ $data->nuptk }} - {{ $data->nameGuru }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- button down --}}
            <div class="relative mt-5">
                <a href="{{ route('mapel') }}"
                    class="btn btn-secondary py-1 px-2 bg-red-600 mb-5 mr-2 rounded-lg text-black font-bold hover:text-white hover:bg-red-700">
                    Back
                </a>
                <button type="submit"
                    class="btn btn-secondary py-1 px-2 bg-green-500 mb-5 rounded-lg text-black font-bold hover:text-white hover:bg-green-700">
                    Save
                </button>
            </div>
        </form>


    </x-sidebar>
</main-layout>
