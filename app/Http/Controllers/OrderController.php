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
use App\Http\Services\UploadService;
use Illuminate\Support\Facades\Auth;
use App\Repository\UserRepositoryInterface;
use App\Repository\OrderRepositoryInterface;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;
    private UploadService $uploadService;
    private UserRepositoryInterface $userRepository;

    public function __construct(OrderRepositoryInterface $orderRepository,UserRepositoryInterface $userRepository,UploadService $uploadService){
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->uploadService = $uploadService;
    }

    public function createOrder(OrderRequest $request){
        $req = Order::addAdditionalData($request->validated());

        $res = $this->uploadService->upload($req);

        if($res === "exist"){
            return response()->json([
                'success' => false,
                'errors' => ['Please upload with different name'],
            ], 400);
        }

        if($res === ""){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t upload this document to the server. Try again later'],
            ], 500);
        }

        $created = $this->orderRepository->saveOrder($res);

        if (!$created || $created == null){
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

    public function getUserOrder(){
        $user = $this->userRepository->getAuthUser();
        $userOrder = $this->orderRepository->getOrderByUserId($user[0]->id);

        if($userOrder->isEmpty()){
            return response()->json([
                'success' => false,
                'errors' => ['No order right now for user ' .$user->username . ' right now'],
            ], 200);
        }

        if (!$userOrder || $userOrder == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your order right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'order' => $userOrder
        ], 201);
    }

    public function getOrderDetails($order_id){
        $existOrder = $this->orderRepository->getOrderById($order_id);

        if($existOrder->isEmpty()){
            return response()->json([
                'success' => false,
                'errors' => ['Requested Order not found'],
            ], 400);
        }

        if (!$existOrder || $existOrder == null){
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your order right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'order' => $existOrder
        ], 201);
    }
}