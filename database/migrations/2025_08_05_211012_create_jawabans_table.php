<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel');
            $table->string('name_mapel');
            $table->string('nis');
            $table->string('nameSiswa');
            $table->string('email');
            $table->string('kelas');
            $table->string('jurusan');
            $table->integer('tugas');
            $table->dateTime('pengumpulan');
            $table->integer('nilai')->nullable();
            $table->text('jawabanpdf')->nullable();
            $table->text('jawabanteks')->nullable();
            $table->string('slugTugas');
            $table->string('slugJawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
