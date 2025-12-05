<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <x-sidebar>
        <title>Tambah Data Siswa | E-Learning</title>
        <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
        <form action="{{ route('submitsiswa') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="">
                {{-- NIS --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nis" id="nis"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="nis"
                        class="peer-focus:font-medium absolute pl-1 text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        NIS Siswa*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- NAMA SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nameSiswa" id="nameSiswa"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="nameSiswa"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nama Siswa*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- EMAIL SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="email"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email Siswa*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Tempat Lahir --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="tempatlahir" id="tempatlahir"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="tempatlahir"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Tempat Lahir*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Tanggal Lahir --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="date" name="tanggallahir" id="tanggallahir"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="tanggallahir"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Tanggal Lahir*
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Kelas --}}
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
                            Perkantoran (OTKP)
                        </option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Gender --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="gender" id="gender"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option selected>Gender*</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Agama --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="agama" id="agama"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option selected>Agama*</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khongucu">Khongucu</option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Password --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="password" id="password"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" required />
                    <label for="password"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Password*
                    </label>
                </div>
            </div>

            {{-- button down --}}
            <div class="relative mt-5">
                <a href="{{ route('data-siswa') }}"
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
