<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\KamarKost;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request){
        $req = Order::addAdditionalData($request->validated());

        $requestedKamar = KamarKost::where('id',$req['kamar_id'])->get();

        $req['total_harga'] = $requestedKamar[0]->harga * $req['durasi_kost'];
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
