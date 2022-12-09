<?php

use Carbon\Carbon;
use App\Models\Kost;
use Webpatser\Uuid\Uuid;
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
            Kost::create([
            
                'id' => Uuid::generate(),
                'nama_kost' => 'Graha Sarjana',
                'alamat' => 'Jalan Bumi Marina Emas Selatan E79',
                'fasilitas_listrik' => 'Token,900watt',
                'fasilitas_air' => 'PDAM',
                'no_telp' => '08128273637',
            
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
