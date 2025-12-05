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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->integer('nis');
            $table->string('nameSiswa');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('gender');
            $table->string('agama');
            $table->string('password');
            $table->string('slug');
            $table->string('siswaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
