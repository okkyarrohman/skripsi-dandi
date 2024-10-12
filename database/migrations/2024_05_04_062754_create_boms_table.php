<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('boms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('bahan_id');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->timestamps();

            // Menambahkan foreign key ke tabel menus
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

            // Menambahkan foreign key ke tabel bahans
            $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boms');
    }
};
