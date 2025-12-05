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
        Schema::create('elearnings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel');
            $table->string('name_mapel');
            $table->string('kelas');
            $table->string('pertemuan');
            $table->string('materi');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elearnings');
    }
};
