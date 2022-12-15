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
            $table->uuid('id')->primary()->index();
            $table->string('nama_penghuni')->index();
            $table->string('no_telp');
            $table->string('no_kerabat');
            $table->date('date_mulai');
            $table->date('date_selesai');
            $table->integer('durasi_kost');
            $table->integer('no_kamar');
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('nama_document_pembayaran')->nullable();;
            $table->integer('total_harga');
            $table->string('status')->default('AWAITING_PAYMENT')->index();
            $table->string('deskripsi_status')->nullable()->index();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('foto_ktp');
            $table->string('nama_document_ktp')->index();
            $table->uuid('user_id')->index();
            $table->uuid('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamar');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
