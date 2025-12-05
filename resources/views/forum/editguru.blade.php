<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Edit Data Guru | E-Learning</title>
    <x-sidebar>
        <x-validation-errors class="mb-4 bg-skyblue-300 px-3 py-2" />
        <form action="{{ route('update-guru', $guru->slug) }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="relative z-0 w-full mb-2 text-center bg-sky-400 py-3">
                <p class="text-white text-2xl font-bold hover:text-black">
                    Edit Data Guru
                </p>
            </div>
            <div class="">
                {{-- NIS --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nuptk" id="nuptk"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $guru->nuptk }}" />
                    <label for="nuptk"
                        class="peer-focus:font-medium absolute pl-1 text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        NUPTK
                    </label>
                </div>
            </div>

            <div class="">
                {{-- NAMA SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nameGuru" id="nameGuru"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $guru->nameGuru }}" />
                    <label for="nameGuru"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nama Guru
                    </label>
                </div>
            </div>

            <div class="">
                {{-- EMAIL SISWA --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $guru->email }}" />
                    <label for="email"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email Guru
                    </label>
                </div>
            </div>

            <div class="">
                {{-- Gender --}}
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" name="gender" id="gender"
                        class="block py-2.5 px-1 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="{{ $guru->gender }}">{{ $guru->gender }} (sekarang)</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="">
                {{-- Password --}}
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="password" id="password"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="" />
                    <label for="password"
                        class="peer-focus:font-medium pl-1 absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Password (jika tidak ada perubahan, jangan di isi)
                    </label>
                </div>
            </div>

            {{-- button down --}}
            <div class="relative mt-5">
                <a href="{{ route('data-guru') }}"
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
