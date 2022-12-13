<?php

namespace App\ImplRepository;

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

        if (!$created || $created == null)  {return null;}
        return $created;
    }

    public function getOrderByUserId($user_id){
        $userOrder = Order::where('user_id',$user_id)->get();

        if($userOrder->isEmpty())   return (object)[];
        if (!$userOrder || $userOrder == null)  return null;

        return $userOrder;
    }
}