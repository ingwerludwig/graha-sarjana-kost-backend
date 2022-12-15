<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\KamarKost;
use App\Util\StorageUtil;

class UploadService{
    
    private $s3Util;

    public function __construct($storageUtil = new StorageUtil())
    {
        $this->s3Util = $storageUtil;
    }

    public function upload($req){
        if(empty($req['bukti_pembayaran'])){
            $requestedKamar = KamarKost::where('id',$req['kamar_id'])->get();
            if(!$requestedKamar || $requestedKamar==null){return null;}

            $req['date_mulai'] = Carbon::parse($req['date_mulai'])->format('m/d/Y');
            $req['date_selesai'] = Carbon::parse($req['date_mulai'])->addMonths(5)->format('m/d/Y');
            $req['no_kamar'] = $requestedKamar[0]->no_kamar;

            $isExistsOrderKTP = Order::where('nama_document_ktp', $req['nama_document_ktp'])->count();

            if($isExistsOrderKTP > 0)   {return "exist";}

            $savedName = $req['id'] . "_" . $req['nama_document_ktp'] . "_" . $req['no_kamar']; //without .pdf extension

            $res = $this->s3Util->upload(file_get_contents($req['foto_ktp']), $savedName);
            if($res === "") {return $res;}

            $req['foto_ktp'] = "https://ipfs.filebase.io/ipfs/" . $res;

            return $req;
        }

        else{
            // dd($req['nama_document_pembayaran']);
            $isExistsOrderBukti = Order::where('nama_document_pembayaran', $req['nama_document_pembayaran'])->count();

            if($isExistsOrderBukti > 0)   {return "exist";}
    
            $savedName = $req['order_id'] . "_" . $req['nama_document_pembayaran']; //without .pdf extension
    
            $res = $this->s3Util->upload(file_get_contents($req['bukti_pembayaran']), $savedName);
            if($res === "") {return $res;}
    
            $req['bukti_pembayaran'] = "https://ipfs.filebase.io/ipfs/" . $res;
            return $req;
        }

        
    }
}