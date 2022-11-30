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
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('kost_id');
            $table->uuid('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign('kamar_id');
            $table->dropColumn('kamar_id');
            $table->uuid('kost_id');
            $table->foreign('kost_id')->references('id')->on('kost');
        });
    }
};
