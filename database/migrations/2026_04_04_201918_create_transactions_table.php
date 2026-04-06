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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        
        // Buat kolomnya dulu secara manual
        $table->unsignedBigInteger('user_id'); 
        
        $table->string('description');
        $table->decimal('amount', 12, 2);
        $table->enum('type', ['income', 'expense']);
        $table->string('category')->nullable();
        $table->timestamps();

        // Baru colokin relasinya ke tabel users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
