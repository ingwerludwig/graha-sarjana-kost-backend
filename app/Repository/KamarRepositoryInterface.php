<?php

namespace App\Repository;

interface KamarRepositoryInterface
{
    public function getKamarById($kamar_id);
    public function getKamarByNoAndKostId($no_kamar,$kost_id);
    public function getKamarByStatusAvailable();
    public function saveKamar($kamar);
}