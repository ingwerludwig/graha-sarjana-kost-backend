<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKostRequest;
use App\Repository\FQHFOQ\KostRepositoryInterface;

class KosController extends Controller
{
    private KostRepositoryInterface $kostRepository;

    public function __construct(KostRepositoryInterface $kostRepository){
        $this->kostRepository = $kostRepository;
    }

    public function addKos(AddKostRequest $request){
        $req = Kost::addAdditionalData($request->validated());

        $created = $this->kostRepository->saveKost($req);
       
        if (!$created || $created == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your Kos right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kost' => $created
        ], 201);
    }

    public function getKost()
    {
        $existKos = $this->kostRepository->getKostByFirstAsc();

        if (!$existKos || $existKos == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t get kos data right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kost' => $existKos
        ], 201);
    }
}
