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
        Schema::create('money_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_donasi')->constrained('donations')->onDelete('cascade');
            $table->foreignId('id_bank')->constrained('method_payments')->onDelete('cascade');
            $table->string('nama_bank');
            $table->string('nama_pemilik');
            $table->string('nomor_rekening');
            $table->decimal('nominal', 10, 2)->nullable();


            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_donations');
    }
};
