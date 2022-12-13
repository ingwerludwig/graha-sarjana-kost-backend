<?php

namespace App\ImplRepository;

use App\Models\User;
use App\Models\KamarKost;
use Illuminate\Support\Facades\Auth;
use App\Repository\KamarRepositoryInterface;
class KamarRepositoryImpl implements KamarRepositoryInterface
{
    public function getKamarByNoAndKostId($no_kamar,$kost_id){
        $existKamar = KamarKost::where('kost_id',$kost_id)
        ->where('no_kamar',$no_kamar)
        ->count();
        return $existKamar;
    }

    public function saveKamar($req){
        $created = KamarKost::create($req);

        if (!$created || $created == null)  {return null;}
        return $created;
    }

    public function getKamarByStatusAvailable(){
        $kamar = KamarKost::where('is_available',true)
        ->get();

        if ($kamar->isEmpty())  {return (object)[];}
        if (!$kamar[0] || $kamar[0] == null)    {return null;}
        return $kamar;
    }
    
    public function getKamarById($kamar_id){
        $existKamar = KamarKost::where('id',$kamar_id)->get();

        if (!$existKamar || $existKamar == null)    {return null;}
        return $existKamar;
    }
}