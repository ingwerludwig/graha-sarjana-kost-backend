<?php

namespace App\Repository;

interface KostRepositoryInterface
{
    public function getKostByFirstAsc();
    public function saveKost($kost);
    public function saveKostMongoDb($kost);
}
