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
        Schema::create('laporan_masalahs', function (Blueprint $table) {
            $table->id();
        $table->foreignId('id_masyarakat')
                ->nullable()
                ->constrained('masyarakats')
                ->onDelete('cascade');
                
        $table->foreignId('id_fasilitas')
                ->nullable()
                ->constrained('fasilitas') 
                ->onDelete('cascade'); 

        $table->string('jenis_masalah', 100)->default('Tidak dapat menemukan masalah');
        $table->text('deskripsi_masalah');
        $table->date('tanggal_laporan');
        $table->string('status', 50)->default('baru');
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_masalahs');
    }
};
