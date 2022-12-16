<?php

namespace App\ImplRepository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Repository\OrderRepositoryInterface;

class OrderRepositoryImpl implements OrderRepositoryInterface
{
    public function getNamaDocumentKtp($nama_document_ktp){
        $isExistsOrderKTP = Order::where('nama_document_ktp', $nama_document_ktp)->count();
        return $isExistsOrderKTP;
    }

    public function saveOrder($req){
        $created = Order::create($req);

        if (!$created || $created == null)  
            return null;
        return $created;
    }

    public function getOrderByUserId($user_id){
        $userOrder = Order::where('user_id',$user_id)->get();

        if($userOrder->isEmpty())   
            return collect([]);
        if (!$userOrder || $userOrder == null)  
            return null;
        return $userOrder;
    }

    public function getOrderById($order_id){
        $existOrder = Order::where('id',$order_id)->get();

        if($existOrder->isEmpty())   
            return collect([]);
        if (!$existOrder || $existOrder == null) 
            return null;
        return $existOrder;
    }

    public function getAllUserOrder(){
        $userOrder = Order::where('status','!=','VERIFIED')
        ->where('status','!=','CANCELED')->get();

        if($userOrder->isEmpty())   
            return collect([]);
        if (!$userOrder || $userOrder == null) 
            return null;
        return $userOrder;
    }

    public function updateBukti($req){
        $userOrder = Order::where('id',$req['order_id'])
        ->update([
            'status' => 'AWAITING_VERIFICATION',
            'tanggal_pembayaran' => Carbon::now(),
            'deskripsi_status' => null,
            'nama_document_pembayaran' => $req['nama_document_pembayaran'],
            'bukti_pembayaran' => $req['bukti_pembayaran'],
        ]);

        if (!$userOrder || $userOrder == null) 
            return null;
        $userOrder = Order::where('id',$req['order_id'])->get();
        return $userOrder;
    }

    public function cancelOrder($order_id){
        $cancelOrder = Order::where('id',$order_id)
        ->update([
            'status' => 'CANCELED',
            'deskripsi_status' => null,
            'nama_document_pembayaran' => null,
            'bukti_pembayaran' => null,
        ]);

        if (!$cancelOrder || $cancelOrder == null) 
            return null;
        $cancelOrder = Order::where('id',$order_id)->get();
        return $cancelOrder;
    }
}