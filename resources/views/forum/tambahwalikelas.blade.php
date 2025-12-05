<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Tambah Data Walikelas | E-Learning</title>
    <x-sidebar>
        <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
        <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="relative z-0 w-full mb-2 text-center bg-sky-400 py-3">
                <p class="text-white text-2xl font-bold hover:text-black">
                    Tambah Data Wali Kelas
                </p>
            </div>
            <div class="">
                {{-- NUPTK --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="nuptk" id="nuptk"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option selected>NUPTK*</option>
                        @foreach ($guru as $data)
                            <option value="{{ $data->nuptk }}">{{ $data->nuptk }} - {{ $data->nameGuru }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Walikelas --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="kelas" id="kelas"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option selected>Kelas*</option>
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
                        <option selected>Jurusan*</option>
                        <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                        <option value="Teknik dan Bisnis Sepeda Motor (TBSM)">Teknik dan Bisnis Sepeda Motor (TBSM)
                        </option>
                        <option value="Otomatisasi dan Tata Kelola Perkantoran (OTKP)">Otomatisasi dan Tata Kelola
                            Perkantoran
                            (OTKP)
                        </option>
                    </select>
                </div>
            </div>

            {{-- button down --}}
            <div class="relative mt-5">
                <a href="{{ route('data-walikelas') }}"
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
