<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::connection('mongodb')->create('kost',function(Blueprint $table){
        //     $table->uuid('id')->primary();
        //     $table->string('nama_kost');
        //     $table->string('alamat');
        //     $table->string('fasilitas_listrik');
        //     $table->string('fasilitas_air');
        //     $table->string('no_telp');
        //     $table->timestamp('created_at')->useCurrent();
        //     $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        //     $table->boolean('status')->default(true);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->table('kost', function (Blueprint $table) {
            $table->drop();
        });
    }
};
