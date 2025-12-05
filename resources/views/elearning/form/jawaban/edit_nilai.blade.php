<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head />

<body class="font-sans antialiased p-15">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Menilai Jawaban | E-Learning</title>
    <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
    <form action="{{ route('upload-nilai', $jawaban->slugJawaban) }}" method="post" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        <div class="relative z-0 w-full mb-2 text-center bg-sky-400 py-3">
            <p class="text-white text-2xl font-bold hover:text-black">
                {{ $jawaban->name_mapel }} : Menilai Tugas {{ $jawaban->tugas }}
            </p>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="teks"
                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="{{ $jawaban->kode_mapel }} - {{ $jawaban->name_mapel }}" disabled />
            <label
                class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-3 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                Kode - Nama Mapel
            </label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="teks"
                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="{{ $jawaban->nis }} - {{ $jawaban->nameSiswa }}" disabled />
            <label
                class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-3 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                NIS - Nama Siswa
            </label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="teks"
                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="{{ $jawaban->kelas }}" disabled />
            <label
                class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-3 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                Kelas
            </label>
        </div>

        {{-- Editor Tugas --}}
        @if (!is_null(optional($jawaban)->jawabanpdf))
            <a href="{{ route('download-jawaban', $jawaban->slugJawaban) }}">
                <span class="text-purple-500">(Klik unduh File Jawaban)</span>
            </a>
        @elseif (!is_null(optional($jawaban)->jawabanteks))
            <textarea name="myeditorinstance" id="myeditorinstance">{!! $jawaban->jawabanteks !!}</textarea>
        @endif

        <div class="relative z-0 w-full mb-5 mt-3 group">
            <input type="teks" name="penilaian" id="penilaian"
                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="{{ $jawaban->nilai }}" required />
            <label for="penilaian"
                class="peer-focus:font-medium absolute text-sm text-blue-700 duration-300 transform -translate-y-3 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                Penilaian
            </label>
        </div>

        {{-- button down --}}
        <div class="relative mt-5">
            <a href="{{ route('open-tugas', $slug = $jawaban->slugTugas) }}"
                class="btn btn-secondary py-1 px-2 bg-red-600 mb-5 mr-1 rounded-lg text-black font-bold hover:text-white hover:bg-red-700">
                Back
            </a>
            <button type="submit"
                class="btn btn-secondary py-1 px-2 bg-green-500 mb-5 rounded-lg text-black font-bold hover:text-white hover:bg-green-700">
                Save
            </button>
        </div>
    </form>

    @stack('modals')

    @livewireScripts
</body>

</html>
