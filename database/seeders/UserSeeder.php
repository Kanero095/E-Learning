<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\guru;
use App\Models\siswa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultPassword = bcrypt('password123');

        // ==========================================
        // 1. DATA USER: ADMIN
        // ==========================================
        $admins = [
            [
                'name' => 'Administrator Utama',
                'email' => 'admin@elearning.sch.id',
                'password' => $defaultPassword,
                'roles' => 'admin',
                'email_verified_at' => Carbon::now(),
            ],
            [
                'name' => 'esa',
                'email' => 'esa@admin.com',
                'password' => bcrypt('zxcvb'),
                'roles' => 'admin',
                'email_verified_at' => Carbon::now(),
            ],
        ];

        foreach ($admins as $adminData) {
            User::updateOrCreate(
                ['email' => $adminData['email']],
                $adminData
            );
        }

        // ==========================================
        // 2. DATA USER & GURU (TENAGA PENDIDIK)
        // ==========================================
        $gurus = [
            [
                'nuptk' => '198501012010011001',
                'nameGuru' => 'Drs. Bambang Hidayat, M.Pd.',
                'email' => 'bambang@guru.sch.id',
                'gender' => 'Laki-Laki',
                'password' => $defaultPassword,
                'guruid' => 'password123',
                'slug' => 'slug-guru-' . Str::lower(Str::random(12)),
            ],
            [
                'nuptk' => '199002152015022002',
                'nameGuru' => 'Siti Rahmawati, S.Kom.',
                'email' => 'siti@guru.sch.id',
                'gender' => 'Perempuan',
                'password' => $defaultPassword,
                'guruid' => 'password123',
                'slug' => 'slug-guru-' . Str::lower(Str::random(12)),
            ],
            [
                'nuptk' => '198811202014011003',
                'nameGuru' => 'Ahmad Fauzi, S.T.',
                'email' => 'fauzi@guru.sch.id',
                'gender' => 'Laki-Laki',
                'password' => $defaultPassword,
                'guruid' => 'password123',
                'slug' => 'slug-guru-' . Str::lower(Str::random(12)),
            ],
        ];

        foreach ($gurus as $guruData) {
            // Simpan / update di tabel gurus
            guru::updateOrCreate(
                ['nuptk' => $guruData['nuptk']],
                $guruData
            );

            // Simpan / update di tabel users (untuk login sistem)
            User::updateOrCreate(
                ['email' => $guruData['email']],
                [
                    'name' => $guruData['nameGuru'],
                    'email' => $guruData['email'],
                    'nuptk' => $guruData['nuptk'],
                    'password' => $guruData['password'],
                    'roles' => 'guru',
                    'email_verified_at' => Carbon::now(),
                ]
            );
        }

        // ==========================================
        // 3. DATA USER & SISWA (PESERTA DIDIK)
        // ==========================================
        $siswas = [
            [
                'nis' => '20241001',
                'nameSiswa' => 'Aditya Pratama',
                'email' => 'aditya@siswa.sch.id',
                'tempatlahir' => 'Jakarta',
                'tanggallahir' => '2008-05-12',
                'kelas' => 'X',
                'jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                'gender' => 'Laki-Laki',
                'agama' => 'Islam',
                'password' => $defaultPassword,
                'siswaid' => 'password123',
                'slug' => 'slug-siswa-' . Str::lower(Str::random(12)),
            ],
            [
                'nis' => '20241002',
                'nameSiswa' => 'Nabila Putri',
                'email' => 'nabila@siswa.sch.id',
                'tempatlahir' => 'Bandung',
                'tanggallahir' => '2008-08-20',
                'kelas' => 'X',
                'jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                'gender' => 'Perempuan',
                'agama' => 'Islam',
                'password' => $defaultPassword,
                'siswaid' => 'password123',
                'slug' => 'slug-siswa-' . Str::lower(Str::random(12)),
            ],
            [
                'nis' => '20242001',
                'nameSiswa' => 'Rian Kurniawan',
                'email' => 'rian@siswa.sch.id',
                'tempatlahir' => 'Surabaya',
                'tanggallahir' => '2007-03-15',
                'kelas' => 'XI',
                'jurusan' => 'Teknik dan Bisnis Sepeda Motor (TBSM)',
                'gender' => 'Laki-Laki',
                'agama' => 'Islam',
                'password' => $defaultPassword,
                'siswaid' => 'password123',
                'slug' => 'slug-siswa-' . Str::lower(Str::random(12)),
            ],
            [
                'nis' => '20243001',
                'nameSiswa' => 'Dewi Lestari',
                'email' => 'dewi@siswa.sch.id',
                'tempatlahir' => 'Semarang',
                'tanggallahir' => '2006-11-09',
                'kelas' => 'XII',
                'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
                'gender' => 'Perempuan',
                'agama' => 'Islam',
                'password' => $defaultPassword,
                'siswaid' => 'password123',
                'slug' => 'slug-siswa-' . Str::lower(Str::random(12)),
            ],
        ];

        foreach ($siswas as $siswaData) {
            // Simpan / update di tabel siswas
            siswa::updateOrCreate(
                ['nis' => $siswaData['nis']],
                $siswaData
            );

            // Simpan / update di tabel users (untuk login sistem)
            User::updateOrCreate(
                ['email' => $siswaData['email']],
                [
                    'name' => $siswaData['nameSiswa'],
                    'email' => $siswaData['email'],
                    'nis' => $siswaData['nis'],
                    'password' => $siswaData['password'],
                    'roles' => 'siswa',
                    'email_verified_at' => Carbon::now(),
                ]
            );
        }
    }
}
