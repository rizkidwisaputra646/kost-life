<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();

            // 1. Kabel ke User (Biar budget tiap orang beda-beda)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 2. Nominal Budget (Contoh: 1.000.000)
            $table->decimal('amount', 12, 2); 

            // 3. Bulan & Tahun (Contoh: April 2026)
            // Biar tiap bulan kamu bisa set budget yang beda
            $table->string('month_year'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
