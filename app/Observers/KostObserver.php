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
        // $arrFasilitas = [
        //     '3x4 m.persegi,Kloset Duduk,Lemari,Listrik Token',
        //     '5x4 m.persegi,Kloset Jongkok,-,Listrik Token',
        //     '4x4 m.persegi,Kloset Duduk,Lemari,Listrik Token'
        // ];
        // $arrKamarMandi =[
        //     'Kamar Mandi Dalam',
        //     'Kamar Mandi Luar'
        // ];

        // for($i=1 ; $i<=20 ; $i++){
        //     $data = [
        //         [
        //             'id' => Uuid::generate()->string,
        //             'no_kamar' => $i,
        //             'fasilitas' => $arrFasilitas[mt_rand(0, count($arrFasilitas) - 1)],
        //             'kamar_mandi' => $arrKamarMandi[mt_rand(0, count($arrKamarMandi) - 1)],
        //             'harga' => rand(1300000,2000000),
        //             'created_at' => Carbon::now(),
        //             'kost_id' => $kost->id,
        //             'updated_at' => Carbon::now(),
        //             'is_available' => true,
        //         ]

        //     ];

        //     $inserted = KamarKost::insert($data);
        //     if(!$inserted || $inserted == null)
        //     {
        //         Log::critical("Kost Trigger Failed on Kost id " . $kost->id);
        //     }
        // }
    }
}
