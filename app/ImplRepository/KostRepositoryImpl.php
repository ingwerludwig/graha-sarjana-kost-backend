<?php

namespace App\ImplRepository;

use App\Models\Kost;

use App\Models\KostMongoDB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\KostRepositoryInterface;

class KostRepositoryImpl implements KostRepositoryInterface
{
    public function getKostByFirstAsc(){
        $existKos = Kost::first();

        if (!$existKos || $existKos == null)
            return null;
        return $existKos;
    }

    public function saveKost($req){
        $created = Kost::create($req);
       
        if (!$created || $created == null)
            return null;
        return $created;
    }

    public function saveKostMongodb($kost){
        $created = KostMongoDB::create($kost);
       
        if (!$created || $created == null)
            return null;
        return $created;
    }
}