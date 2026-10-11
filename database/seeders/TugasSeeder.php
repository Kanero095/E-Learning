<?php

namespace Database\Seeders;

use App\Models\mapel;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tugass = [
            [
                'kode_mapel' => 'MPL-TKJ-101',
                'tugas' => 1,
                'soalteks' => '<p><strong>Instruksi Tugas 1:</strong></p><p>Buatlah struktur dasar halaman web portofolio personal menggunakan HTML5 semantik dan styling CSS modern. Pastikan mencakup bagian Header, Tentang Saya, Keahlian, dan Kontak.</p>',
                'soalpdf' => null,
                'opened' => Carbon::now()->subDays(1),
                'due' => Carbon::now()->addDays(7),
            ],
            [
                'kode_mapel' => 'MPL-TKJ-102',
                'tugas' => 1,
                'soalteks' => '<p><strong>Instruksi Tugas 1:</strong></p><p>Rancang diagram topologi jaringan lokal (LAN) untuk laboratorium komputer SMK yang terdiri dari 36 unit komputer klien, 1 server lokal, dan 1 gateway router MikroTik. Tuliskan skema pembagian IP address (Subnetting /27).</p>',
                'soalpdf' => null,
                'opened' => Carbon::now()->subDays(2),
                'due' => Carbon::now()->addDays(5),
            ],
        ];

        foreach ($tugass as $item) {
            $mapel = mapel::where('kode_mapel', $item['kode_mapel'])->first();
            if ($mapel) {
                Tugas::updateOrCreate(
                    [
                        'kode_mapel' => $item['kode_mapel'],
                        'tugas' => $item['tugas'],
                    ],
                    [
                        'name_mapel' => $mapel->name_mapel,
                        'kelas' => $mapel->kelas,
                        'soalteks' => $item['soalteks'],
                        'soalpdf' => $item['soalpdf'],
                        'opened' => $item['opened'],
                        'due' => $item['due'],
                        'slug' => 'slug-tgs-' . Str::lower($item['kode_mapel']) . '-t' . $item['tugas'] . '-' . Str::lower(Str::random(6)),
                    ]
                );
            }
        }
    }
}
