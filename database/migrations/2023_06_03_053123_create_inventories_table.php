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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mesin');
            $table->integer('kapasitasi_mesin');
            $table->integer('waktu_pencucian');
            $table->integer('perkiraan_air');
            $table->boolean('is_active')->default(false);
            $table->string('comment')->nullable();
            $table->boolean('is_express')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
