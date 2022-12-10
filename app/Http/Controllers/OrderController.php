<?php

namespace App\Http\Controllers;

use Date;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\KamarKost;
use App\Util\StorageUtil;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $s3Util;

    public function __construct($storageUtil = new StorageUtil())
    {
        $this->s3Util = $storageUtil;
    }

    public function createOrder(OrderRequest $request){
        $req = Order::addAdditionalData($request->validated());

        $requestedKamar = KamarKost::where('id',$req['kamar_id'])->get();

        $req['date_mulai'] = Carbon::parse($req['date_mulai'])->format('d-m-Y');
        $req['date_selesai'] = Carbon::parse($req['date_mulai'])->addMonths(5)->format('d-m-Y');
        $req['no_kamar'] = $requestedKamar[0]->no_kamar;

        $isExistsOrderKTP = Order::where('nama_document_ktp', $req['nama_document_ktp'])->count();

        if($isExistsOrderKTP > 0)
        {
            return response()->json([
                'success' => false,
                'errors' => ['Please upload with different name'],
            ], 400);
        }

        $savedName = $req['id'] . "_" . $req['nama_document_ktp'] . "_" . $req['no_kamar']; //without .pdf extension

        $res = $this->s3Util->upload(file_get_contents($req['foto_ktp']), $savedName);
        if($res === "")
        {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t upload this document to the server. Try again later'],
            ], 500);
        }

        $req['foto_ktp'] = "https://ipfs.filebase.io/ipfs/" . $res;

        $created = Order::create($req);

        if (!$created || $created == null)
        {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your order right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'order' => $created
        ], 201);
    }

    public function getUserOrder(){{
        $user = Auth::user();

        $userOrder = Order::where('user_id',$user->id)->get();

        if($userOrder->isEmpty()){
            return response()->json([
                'success' => false,
                'errors' => ['No order right now for user ' .$user->username . ' right now'],
            ], 200);
        }

        if (!$userOrder || $userOrder == null)
        {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your order right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'order' => $userOrder
        ], 201);
    }}
}
