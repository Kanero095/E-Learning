<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<main-layout>
    <title>Dashboard | E-Learning</title>
    <x-sidebar>
        <div class="flex">
            {{-- data siswa --}}
            <button class="flex items-center space-x-2 mx-3">
                <div class="flex items-center space-x-2 border-2 border-black p-2 w-80 h-40 rounded-xl bg-pink-300">
                    <div class="text-5xl font-bold w-[50%] text-white">
                        {{ $datasiswa }}
                    </div>
                    <div class="font-bold text-2xl text-white">
                        Data Siswa
                    </div>
                </div>
            </button>

            {{-- data guru --}}
            <button class="flex items-center space-x-2 mx-3">
                <div class="flex items-center space-x-2 border-2 border-black p-2 w-80 h-40 rounded-xl bg-red-500">
                    <div class="text-5xl font-bold w-[50%] text-white">
                        {{ $dataguru }}
                    </div>
                    <div class="font-bold text-2xl text-white">
                        Data Guru
                    </div>
                </div>
            </button>

            {{-- ruang kelas --}}
            <button class="flex items-center space-x-2 mx-3">
                <div class="flex items-center space-x-2 border-2 border-black p-2 w-80 h-40 rounded-xl bg-yellow-500">
                    <div class="text-5xl font-bold w-[50%] text-white">
                        {{ $ruangkelas }}
                    </div>
                    <div class="font-bold text-2xl text-white">
                        Ruang Kelas
                    </div>
                </div>
            </button>
        </div>
    </x-sidebar>
</main-layout>
