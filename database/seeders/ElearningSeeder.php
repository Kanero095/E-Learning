<?php

namespace Database\Seeders;

use App\Models\elearning;
use App\Models\mapel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ElearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pertemuans = [
            [
                'kode_mapel' => 'MPL-TKJ-101',
                'pertemuan' => 1,
                'materi' => 'modul-dasar-pemrograman-web-p1.pdf',
            ],
            [
                'kode_mapel' => 'MPL-TKJ-101',
                'pertemuan' => 2,
                'materi' => 'modul-html-css-modern-p2.pdf',
            ],
            [
                'kode_mapel' => 'MPL-TKJ-102',
                'pertemuan' => 1,
                'materi' => 'modul-infrastruktur-jaringan-p1.pdf',
            ],
            [
                'kode_mapel' => 'MPL-TBSM-201',
                'pertemuan' => 1,
                'materi' => 'modul-pemeliharaan-mesin-p1.pdf',
            ],
        ];

        foreach ($pertemuans as $item) {
            $mapel = mapel::where('kode_mapel', $item['kode_mapel'])->first();
            if ($mapel) {
                elearning::updateOrCreate(
                    [
                        'kode_mapel' => $item['kode_mapel'],
                        'pertemuan' => (string)$item['pertemuan'],
                    ],
                    [
                        'name_mapel' => $mapel->name_mapel,
                        'kelas' => $mapel->kelas,
                        'materi' => $item['materi'],
                        'slug' => 'slug-ptm-' . Str::lower($item['kode_mapel']) . '-p' . $item['pertemuan'] . '-' . Str::lower(Str::random(6)),
                    ]
                );
            }
        }
    }
}
