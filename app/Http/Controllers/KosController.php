<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKostRequest;

class KosController extends Controller
{
    public function addKos(AddKostRequest $request){

        $req = Kost::addAdditionalData($request->validated());
        $created = Kost::create($req);
       
        if (!$created || $created == null)
        {
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
        $existKos = Kost::first();

        if (!$existKos || $existKos == null)
        {
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
