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
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('histori_perhitungan_id')->constrained('histori_perhitungan')->onDelete('cascade');
            $table->foreignId('wisata_id')->constrained('wisata')->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
            $table->float('nilai')->nullable();
            $table->foreignId('sub_kriteria_id')->nullable()->constrained('sub_kriteria')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_alternatif');
    }
};
