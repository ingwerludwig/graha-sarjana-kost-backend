<?php

namespace App\Repository;

interface OrderRepositoryInterface
{
    public function getNamaDocumentKtp($nama_document_ktp);
    public function saveOrder($order);
    public function getOrderByUserId($user_id);
    public function getOrderById($order_id);
    public function getAllUserOrder();
    public function updateBukti($req);
}