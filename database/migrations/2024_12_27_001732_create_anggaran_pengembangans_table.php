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
        Schema::create('anggaran_pengembangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 100);
            $table->text('deskripsi_kegiatan');
            $table->decimal('jumlah_anggaran', 15, 2);
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['disetujui','pending','ditolak'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran_pengembangans');
    }
};
