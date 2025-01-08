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
        Schema::create('fasilitas_perencanaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fasilitas')->references('id')->on('fasilitas')->onDelete('cascade');
            $table->foreignId('id_perencanaan')->references('id')->on('perencanaans')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_perencanaan');
    }
};
