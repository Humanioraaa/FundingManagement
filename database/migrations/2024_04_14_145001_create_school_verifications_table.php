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
        // Schema::create('school_verifications', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('school_logo')->nullable();;
        //     $table->string('school_name');
        //     $table->string('school_address');
        //     $table->string('school_phone')->unique();
        //     $table->string('school_email')->unique();
        //     $table->string('password');
        //     $table->string('registrant_name')->nullable();;
        //     $table->string('registrant_email')->nullable();;
        //     $table->string('registrant_number')->nullable();;
        //     $table->string('registrant_identity_number')->nullable();;
        //     $table->string('registrant_proof')->nullable();;
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('school_verifications');
    }
};
