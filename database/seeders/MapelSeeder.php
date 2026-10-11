<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\mapel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapels = [
            [
                'kode_mapel' => 'MPL-TKJ-101',
                'name_mapel' => 'Pemrograman Web & Perangkat Bergerak',
                'jadwal' => 'Senin',
                'kelas' => 'X',
                'jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                'nuptk' => '199002152015022002', // Siti Rahmawati, S.Kom.
            ],
            [
                'kode_mapel' => 'MPL-TKJ-102',
                'name_mapel' => 'Administrasi Infrastruktur Jaringan',
                'jadwal' => 'Rabu',
                'kelas' => 'X',
                'jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                'nuptk' => '198811202014011003', // Ahmad Fauzi, S.T.
            ],
            [
                'kode_mapel' => 'MPL-TBSM-201',
                'name_mapel' => 'Pemeliharaan Mesin Sepeda Motor',
                'jadwal' => 'Selasa',
                'kelas' => 'XI',
                'jurusan' => 'Teknik dan Bisnis Sepeda Motor (TBSM)',
                'nuptk' => '198501012010011001', // Drs. Bambang Hidayat, M.Pd.
            ],
            [
                'kode_mapel' => 'MPL-OTKP-301',
                'name_mapel' => 'Otomatisasi Tata Kelola Kepegawaian',
                'jadwal' => 'Kamis',
                'kelas' => 'XII',
                'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
                'nuptk' => '198501012010011001', // Drs. Bambang Hidayat, M.Pd.
            ],
        ];

        foreach ($mapels as $item) {
            $guru = guru::where('nuptk', $item['nuptk'])->first();
            mapel::updateOrCreate(
                ['kode_mapel' => $item['kode_mapel']],
                [
                    'name_mapel' => $item['name_mapel'],
                    'jadwal' => $item['jadwal'],
                    'kelas' => $item['kelas'],
                    'jurusan' => $item['jurusan'],
                    'nuptk' => $item['nuptk'],
                    'nameGuru' => $guru ? $guru->nameGuru : 'Pengampu Mapel',
                    'email' => $guru ? $guru->email : 'guru@sekolah.sch.id',
                    'slug' => 'slug-mapel-' . Str::lower($item['kode_mapel']) . '-' . Str::lower(Str::random(6)),
                ]
            );
        }
    }
}
