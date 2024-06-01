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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sekolah')->constrained('schools');
            $table->string('nama_campaign');
            $table->string('foto_campaign')->nullable();
            $table->text('deskripsi_campaign');
            $table->enum('jenis_donasi', ['uang', 'barang']);
            $table->string('status')->nullable();
            $table->text('catatan_campaign')->nullable();
            $table->integer('percentage_collected')->default(0);
            $table->date('tanggal_selesai');
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};