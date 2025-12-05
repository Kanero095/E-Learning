<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Profile</title>
    <x-sidebar>
        <div class="w-full drop-shadow-md bg-white border-[1px] border-gray-200 rounded-xl">
            <h1 class="text-center font-bold text-xl py-3">
                PROFILE
            </h1>

            <div class="px-10 pb-5 grid grid-cols-1 md:grid-cols-3 gap-4 w-full mt-5 md:mt-10">
                {{-- nis / nupt --}}
                @if (Auth::user()->roles == 'siswa')
                    <div class="">
                        <h3 class="font-bold text-base">
                            NIS
                        </h3>
                        <p class="text-gray-500 text-sm">
                            {{ $user->nis }}
                        </p>
                    </div>
                @elseif (Auth::user()->roles == 'guru')
                    <div class="">
                        <h3 class="font-bold text-base">
                            NUPTK
                        </h3>
                        <p class="text-gray-500 text-sm">
                            {{ $user->nuptk }}
                        </p>
                    </div>
                @endif

                {{-- nama --}}
                <div class="">
                    <h3 class="font-bold text-base">
                        Nama Lengkap
                    </h3>
                    <p class="text-gray-500 text-sm">
                        @if (Auth::user()->roles == 'siswa')
                            {{ $user->nameSiswa }}
                        @elseif (Auth::user()->roles == 'guru')
                            {{ $user->nameGuru }}
                        @endif
                    </p>
                </div>

                {{-- email --}}
                <div class="">
                    <h3 class="font-bold text-base">
                        Email
                    </h3>
                    <p class="text-gray-500 text-sm">
                        {{ Auth::user()->email }}
                    </p>
                </div>

                {{-- Gender --}}
                <div class="">
                    <h3 class="font-bold text-base">
                        Gender
                    </h3>
                    <p class="text-gray-500 text-sm">
                        {{ $user->gender }}
                    </p>
                </div>

                {{-- tempat lahir, tanggal lahir --}}
                @if (Auth::user()->roles == 'siswa')
                    <div class="">
                        <h3 class="font-bold text-base">
                            Tempat, Tanggal Lahir
                        </h3>
                        <p class="text-gray-500 text-sm capitalize">
                            {{ $user->tempatlahir }}, {{ \Carbon\Carbon::parse($user->tanggallahir)->format('d-m-Y') }}
                        </p>
                    </div>
                @endif

                {{-- Agama --}}
                @if (Auth::user()->roles == 'siswa')
                    <div class="">
                        <h3 class="font-bold text-base">
                            Agama
                        </h3>
                        <p class="text-gray-500 text-sm">
                            {{ $user->agama }}
                        </p>
                    </div>
                @endif

                {{-- rules --}}
                <div class="">
                    <h3 class="font-bold text-base">
                        Peran
                    </h3>
                    <p class="text-gray-500 text-sm capitalize">
                        {{ Auth::user()->roles }}
                    </p>
                </div>

                {{-- Kelas - Jurusan --}}
                @if (Auth::user()->roles == 'siswa')
                    <div class="">
                        <h3 class="font-bold text-base">
                            Kelas - Jurusan
                        </h3>
                        <p class="text-gray-500 text-sm">
                            {{ $user->kelas }} - {{ $user->jurusan }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </x-sidebar>
</main-layout>
