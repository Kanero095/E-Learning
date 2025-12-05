<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\elearningController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\WalikelasController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','dashboard');
Route::redirect('home', 'dashboard');
Route::redirect('/register', '/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BasicController::class, 'dashboard'])->name('/');
    Route::get('/profile', [BasicController::class, 'profile'])->name('profile');

    // SISWA
    Route::get('/data-siswa', [BasicController::class, 'siswa'])->name('data-siswa');
    Route::get('/tambah-data-siswa', [SiswaController::class, 'tambahsiswa'])->name('tambah-siswa');
    Route::post('/tambah-data-siswa', [SiswaController::class, 'submitsiswa'])->name('submitsiswa');
    Route::get('/show-siswa/{slug}',[SiswaController::class, 'show_siswa'])->name('show-siswa');
    Route::get('/edit-data-siswa/{slug}', [SiswaController::class, 'edit_siswa'])->name('edit-siswa');
    Route::post('/edit-data-siswa/{slug}', [SiswaController::class, 'update_siswa'])->name('update-siswa');
    Route::post('/data-siswa/{slug}', [SiswaController::class, 'delete_siswa'])->name('delete-siswa');

    // GURU
    Route::get('/data-guru', [BasicController::class, 'guru'])->name('data-guru');
    Route::get('/tambah-data-guru', [GuruController::class, 'tambahguru'])->name('tambah-guru');
    Route::post('/tambah-data-guru',[GuruController::class, 'submitguru'])->name('submitguru');
    Route::get('/edit-data-guru/{slug}', [GuruController::class,'edit_guru'])->name('edit-guru');
    Route::post('/edit-data-guru/{slug}', [GuruController::class, 'update_guru'])->name('update-guru');
    Route::post('/data-guru/{slug}', [GuruController::class, 'delete_guru'])->name('delete-guru');

    // WALIKELAS
    Route::get('/data-walikelas', [BasicController::class, 'walikelas'])->name('data-walikelas');
    Route::get('/tambah-data-walikelas', [WalikelasController::class, 'tambahwalikelas'])->name('tambahwalkel');
    Route::post('/tambah-data-walikelas', [WalikelasController::class, 'submitwalkel'])->name('submitwalkel');
    Route::get('/edit-data-walikelas/{slug}',[WalikelasController::class, 'edit_walkel'])->name('edit-walkel');
    Route::post('/edit-data-walikelas/{slug}',[WalikelasController::class, 'update_walkel'])->name('update-walkel');
    Route::post('/data-walikelas/{slug}', [WalikelasController::class, 'delete_walkel'])->name('delete-walkel');

    // MAPEL
    Route::get('/mapel', [BasicController::class, 'mapel'])->name('mapel');
    Route::get('/tambah-mapel', [MapelController::class,'tambahmapel'])->name('tambah-mapel');
    Route::post('tambah-mapel', [MapelController::class, 'submitmapel'])->name('submit-mapel');
    Route::get('/edit-mapel/{slug}',[MapelController::class, 'editmapel'])->name('edit-mapel');
    Route::post('/edit-mapel/{slug}', [MapelController::class, 'updatemapel'])->name('update-mapel');
    Route::post('/mapel/{slug}', [MapelController::class, 'deletemapel'])->name('delete-mapel');

    // JADWAL MAPEL
    Route::get('/jadwal-mapel', [BasicController::class, 'jadwalmapel'])->name('jadwal-mapel');

    // ELEARNING - PERTEMUAN(MATERI)
    Route::get('/elearning',[BasicController::class, 'elearning'])->name('elearning');
    Route::get('/elearning/{slug}', [elearningController::class, 'openmapel'])->name('open-mapel');
    Route::get('/elearning/tambah-pertemuan/{slug}', [elearningController::class, 'tambahpertemuan'])->name('pertemuan');
    Route::post('/elearning/tambah-pertemuan/{slug}', [elearningController::class, 'submitpertemuan'])->name('tambah-pertemuan');
    Route::get('/elearning/materi/{slug}', [elearningController::class, 'downloadmateri'])->name('download-materi');
    Route::post('/elearning/delete-pertemuan/{slug}', [elearningController::class, 'deletepertemuan'])->name('delete-pertemuan');
    Route::get('/elearning/edit-pertemuan/{slug}', [elearningController::class, 'editpertemuan'])->name('edit-pertemuan');
    Route::post('/elearning/edit-pertemuan/{slug}', [elearningController::class, 'updatepertemuan'])->name('update-pertemuan');

    // ELEARNING - TUGAS
    Route::get('/elearning/tambah-tugas/{slug}', [TugasController::class, 'tambahtugas'])->name('tugas');
    Route::post('/elearning/tambah-tugas/{slug}', [TugasController::class,'submittugas'])->name('submit-tugas');
    Route::get('/elearning/buka-tugas/{slug}', [TugasController::class, 'opentugas'])->name('open-tugas');
    Route::post('/elearning/delete-tugas/{slug}', [TugasController::class, 'deletetugas'])->name('delete-tugas');
    Route::get('/elearning/edit-tugas/{slug}', [TugasController::class, 'edittugas'])->name('edit-tugas');
    Route::post('/elearning/edit-tugas/{slug}', [TugasController::class, 'updatetugas'])->name('update-tugas');
    Route::get('/elearning/tugas/{slug}', [TugasController::class, 'downloadtugas'])->name('download-tugas');

    // JAWABAN
    Route::get('/elearning/tugas/upload-jawaban/{slug}', [JawabanController::class, 'jawaban'])->name('jawab');
    Route::post('/elearning/tugas/upload-jawaban/{slug}', [JawabanController::class, 'uploadjawaban'])->name('upload-jawaban');
    Route::get('/elearning/tugas/edit-jawaban/{slug}', [JawabanController::class,'editjawaban'])->name('edit-jawaban');
    Route::post('/elearning/tugas/update-jawaban/{slug}', [JawabanController::class, 'updatejawaban'])->name('update-jawaban');
    Route::get('/elearning/tugas/nilai-jawaban/{slugJawaban}', [JawabanController::class, 'editnilai'])->name('edit-nilai');
    Route::post('elearning/tugas/upload-nilai/{slugJawaban}', [JawabanController::class, 'uploadnilai'])->name('upload-nilai');
    Route::get('/elearning/tugas/download-jawaban/{slugJawaban}', [JawabanController::class, 'downloadjawaban'])->name('download-jawaban');
});
