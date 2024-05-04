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
        Schema::create('mps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->date('tanggal');
            $table->string('jumlah');
            $table->timestamps();

            // Menambahkan foreign key ke tabel menus
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mps');
    }
};
