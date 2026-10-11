<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\walikelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WalikelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penugasan = [
            [
                'nuptk' => '199002152015022002', // Siti Rahmawati, S.Kom.
                'kelas' => 'X',
                'jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
            ],
            [
                'nuptk' => '198811202014011003', // Ahmad Fauzi, S.T.
                'kelas' => 'XI',
                'jurusan' => 'Teknik dan Bisnis Sepeda Motor (TBSM)',
            ],
            [
                'nuptk' => '198501012010011001', // Drs. Bambang Hidayat, M.Pd.
                'kelas' => 'XII',
                'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
            ],
        ];

        foreach ($penugasan as $item) {
            $guru = guru::where('nuptk', $item['nuptk'])->first();
            if ($guru) {
                walikelas::updateOrCreate(
                    [
                        'nuptk' => $item['nuptk'],
                        'kelas' => $item['kelas'],
                        'jurusan' => $item['jurusan'],
                    ],
                    [
                        'nameGuru' => $guru->nameGuru,
                        'email' => $guru->email,
                        'gender' => $guru->gender,
                        'slug' => $guru->slug ?? ('slug-walkel-' . Str::lower(Str::random(10))),
                    ]
                );
            }
        }
    }
}
