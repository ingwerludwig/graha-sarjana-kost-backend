<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_penghuni');
            $table->date('date_mulai');
            $table->integer('durasi_kost');
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('total_harga');
            $table->string('status')->default('awaiting_payment');
            $table->date('tanggal_pembayaran')->nullable();
            $table->integer('kamar_id');
            $table->uuid('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('kamar_id')->references('id')->on('kamar');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
