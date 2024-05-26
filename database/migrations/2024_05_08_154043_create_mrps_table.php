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
        Schema::create('mrps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_id')->nullable();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('bahan_id')->nullable();
            $table->unsignedBigInteger('mps_id')->nullable();
            $table->date('dateStart')->nullable();
            $table->date('dateEnd')->nullable();
            $table->timestamps();
            $table->foreign('bom_id')->references('id')->on('boms');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('bahan_id')->references('id')->on('bahans');
            $table->foreign('mps_id')->references('id')->on('mps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mrps');
    }
};
