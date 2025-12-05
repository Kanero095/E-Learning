<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>E-Learning</title>
    <x-sidebar>
        <div class="">
            @if (Auth::user()->roles == 'siswa')
                <div class="relative">
                    <h1 class="text-2xl">
                        Selamat Datang, <span class="capitalize font-bold">{{ Auth::user()->name }}</span>✋🏻
                    </h1>
                </div>
            @elseif(Auth::user()->roles == 'guru')
                @if ($guru->gender == 'Laki-Laki')
                    <div class="relative">
                        <h1 class="text-2xl">
                            Selamat Datang, Bapak <span class="capitalize font-bold">{{ Auth::user()->name }}</span>
                        </h1>
                    </div>
                @elseif($guru->gender == 'Perempuan')
                    <div class="relative">
                        <h1 class="text-2xl">
                            Selamat Datang, Ibu <span class="capitalize font-bold">{{ Auth::user()->name }}</span>
                        </h1>
                    </div>
                @endif
            @endif
            <div class="relative">
                @if (Auth::user()->roles == 'siswa' || Auth::user()->roles == 'guru')
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                        @foreach ($mapel as $data)
                            <div
                                class="w-full max-w-xs mx-auto mt-1 drop-shadow-md border-2 border-[#000] rounded-2xl overflow-hidden p-2 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-95 duration-300">
                                <a href="{{ route('open-mapel', $data->slug) }}">
                                    {{-- gambar --}}
                                    <img src="{{ asset('image/png/' . $data->id . '.png') }}"
                                        class="w-full h-32 object-cover" alt="{{ $data->name_mapel }}">

                                    {{-- konten --}}
                                    <div class="p-4">
                                        <h2 class="text-center text-lg md:text-2xl font-bold py-1">
                                            ({{ $data->kode_mapel }})
                                            {{ $data->name_mapel }}

                                        </h2>
                                        <p class="text-center text-gray-600 mt-1">
                                            {{ $data->nameGuru }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>
                        <span class="capitalize bold text-2xl">{{ Auth::user()->name }},</span>
                        <br>
                        Anda tidak memiliki akses di halaman ini!
                    </p>
                @endif
            </div>
        </div>
    </x-sidebar>
</main-layout>
