<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\KamarKost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKamarRequest;

class KamarController extends Controller
{
    public function addKamar(AddKamarRequest $request)
    {
        $req = Kost::addAdditionalData($request->validated());

        $existKamar = KamarKost::where('kost_id',$req['kost_id'])
        ->where('no_kamar',$req['no_kamar'])
        ->count();
        
        if($existKamar > 0){
            return response()->json([
                'success' => false,
                'errors' => ['Kamar already added'],
            ], 400);
        }

        $created = KamarKost::create($req);

        if (!$created || $created == null)
        {
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

        $kamar = KamarKost::where('is_available',true)
        ->get();

        if ($kamar->isEmpty()){
            return response()->json([
                'success' => false,
                'errors' => ['There is no such kamar'],
            ], 200);
        }

        if (!$kamar[0] || $kamar[0] == null)
        {
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

}