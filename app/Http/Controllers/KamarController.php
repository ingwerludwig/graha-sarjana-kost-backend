<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\KamarKost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKamarRequest;
use App\Repository\KamarRepositoryInterface;

class KamarController extends Controller
{
    private KamarRepositoryInterface $kamarRepository;

    public function __construct(KamarRepositoryInterface $kamarRepository){
        $this->kamarRepository = $kamarRepository;
    }

    public function addKamar(AddKamarRequest $request)
    {
        $req = Kost::addAdditionalData($request->validated());
   
        $existKamar = $this->kamarRepository->getKamarByNoAndKostId($req['no_kamar'],$req['kost_id']);
        
        if($existKamar > 0){
            return response()->json([
                'success' => false,
                'errors' => ['Kamar already added'],
            ], 400);
        }

        $created = $this->kamarRepository->saveKamar($req);

        if (!$created || $created == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your kamar right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kost' => $created
        ], 201);
    }

    public function getAvailableKamar()
    {
        $kamar = $this->kamarRepository->getKamarByStatusAvailable();

        if ($kamar->isEmpty()){
            return response()->json([
                'success' => false,
                'errors' => ['There is no such kamar'],
            ], 200);
        }

        if (!$kamar[0] || $kamar[0] == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t get kamar data right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kamar' => $kamar
        ], 201);
    }

    public function getKamarDetails($kamar_id){
        $existKamar = $this->kamarRepository->getKamarById($kamar_id);

        if (!$existKamar || $existKamar == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t get kamar data right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kamar' => $existKamar
        ], 201);
    }

}