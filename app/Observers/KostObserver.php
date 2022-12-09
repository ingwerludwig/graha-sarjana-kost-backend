<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Kost;
use Webpatser\Uuid\Uuid;
use App\Models\KamarKost;
use Illuminate\Support\Facades\Log;

class KostObserver
{
    /**
     * Handle the Kost "created" event.
     *
     * @param  \App\Models\Kost  $kost
     * @return void
     */
    public function created(Kost $kost)
    {
        $data = [
            [
                'id' => Uuid::generate()->string,
                'no_kamar' => 1,
                'fasilitas' => '3x4 m.persegi,Kloset Duduk,Lemari,Listrik Token',
                'kamar_mandi' => 'Kamar Mandi Dalam',
                'harga' => '1300000',
                'created_at' => Carbon::now(),
                'kost_id' => $kost->id,
                'updated_at' => Carbon::now(),
                'is_available' => true,
            ],

            [
                'id' => Uuid::generate()->string,
                'no_kamar' => 2,
                'fasilitas' => '4x4 m.persegi,Kloset Duduk,Lemari,Listrik Token',
                'kamar_mandi' => 'Kamar Mandi Dalam',
                'harga' => '1400000',
                'kost_id' => $kost->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'is_available' => true,
            ],
            [
                'id' => Uuid::generate()->string,
                'no_kamar' => 3,
                'fasilitas' => '5x4 m.persegi,Kloset Jongkok,-,Listrik Token',
                'kamar_mandi' => 'Kamar Mandi Luar',
                'harga' => '1500000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'kost_id' => $kost->id,
                'is_available' => true,
            ],
            
        ];

        $inserted = KamarKost::insert($data);
        if(!$inserted || $inserted == null)
        {
            Log::critical("Kost Trigger Failed on Kost id " . $kost->id);
        }
    }

    
}
