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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Kolom untuk nomor auto-generated (Contoh : WO56784)
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade'); // Kolom untuk relasi ke user table
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade'); // Kolom untuk relasi ke user table
            $table->string('code'); // Kolom untuk nomor auto-generated (Contoh : WO56784)
            $table->enum('type', ['complain', 'work_order']); // Kolom untuk opsi complain atau work order
            $table->text('description'); // Kolom untuk deskripsi pekerjaan yang di complain atau work order
            $table->string('photo')->nullable(); // Kolom untuk foto (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
