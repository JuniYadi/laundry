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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('package_id');
            $table->integer('inventory_id');
            $table->integer('karyawan_id')->nullable();
            $table->integer('berat_pakaian');
            $table->integer('total_harga');
            $table->integer('estimasi');
            $table->integer('waktu_pencucian');
            $table->integer('penggunaan_air');
            $table->string('status');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_refund')->default(false);
            $table->integer('refund_amount')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
