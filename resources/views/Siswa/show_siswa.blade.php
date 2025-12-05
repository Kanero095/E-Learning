<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <x-sidebar>
        {{-- button back --}}
        <div class="relative mb-5">
            <a href="{{ route('data-siswa') }}"
                class="btn btn-secondary bg-red-500 py-1 px-2 mb-5 rounded-lg text-black font-bold hover:text-white hover:bg-red-700">
                <- Back </a>
        </div>
        <form action="" method="get">
            <div class="">
                {{-- NIS --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nis" id="nis"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->nis }}" disabled />
                    <label for="nis"
                        class="peer-focus:font-medium absolute pl-1 text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        NIS Siswa*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- NAMA SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nameSiswa" id="nameSiswa"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->nameSiswa }}" disabled />
                    <label for="nameSiswa"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nama Siswa
                    </label>
                </div>
            </div>

            <div class="">
                {{-- EMAIL SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->email }}" disabled />
                    <label for="email"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email Siswa*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Tempat Lahir --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="tempatlahir" id="tempatlahir"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->tempatlahir }}" disabled />
                    <label for="tempatlahir"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Tempat Lahir*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Tanggal Lahir --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="date" name="tanggallahir" id="tanggallahir"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->tanggallahir }}" disabled />
                    <label for="tanggallahir"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Tanggal Lahir*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Kelas --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="kelas" id="kelas"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->kelas }}" disabled />
                    <label for="kelas"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Kelas*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Tanggal Lahir --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="jurusan" id="jurusan"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->jurusan }}" disabled />
                    <label for="jurusan"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Jurusan*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Gender --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="gender" id="gender"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->gender }}" disabled />
                    <label for="gender"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Jenis Kelamin*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Agama --}}

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="agama" id="agama"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $siswa->agama }}" disabled />
                    <label for="agama"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-blue-600 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Agama*
                    </label>
                </div>
            </div>
        </form>


    </x-sidebar>
</main-layout>
