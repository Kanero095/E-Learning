<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>E-Learning | Edit Pertemuan {{ $mapel->name_mapel }} </title>
    <x-sidebar>
        <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
        <form action="{{ route('update-pertemuan', $pertemuan->slug) }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="relative z-0 w-full mb-2 text-center bg-sky-400 py-3">
                <p class="text-white text-2xl font-bold hover:text-black">
                    {{ $pertemuan->name_mapel }} : Edit Pertemuan {{ $pertemuan->pertemuan }}
                </p>
            </div>
            <div class="">
                {{-- Pertemuan ke-? --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="pertemuan" id="pertemuan"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $pertemuan->pertemuan }}" required />
                    <label for="pertemuan"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Pertemuan ke-?*
                    </label>
                </div>
            </div>

            {{-- File Pertemuan --}}
            <div class="relative z-0 w-full mb-5 group">
                <input type="file" name="materi" id="materi" accept=".pdf"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                <label for="materi"
                    class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload
                    File Materi <span class="font-bold">(kosongkan jika tidak ada perubahan materi)</span> </label>
            </div>

            {{-- button down --}}
            <div class="relative mt-5">
                <a href="{{ route('open-mapel', $mapel->slug) }}"
                    class="btn btn-secondary py-1 px-2 bg-red-600 mb-5 mr-1 rounded-lg text-black font-bold hover:text-white hover:bg-red-700">
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
