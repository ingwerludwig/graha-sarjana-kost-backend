<?php

namespace App\Models;

use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_penghuni',
        'no_telp',
        'no_kerabat',
        'date_mulai',
        'date_selesai',
        'durasi_kost',
        'no_kamar',
        'metode_pembayaran',
        'nama_document_pembayaran',
        'nama_document_ktp',
        'foto_ktp',
        'bukti_pembayaran',
        'total_harga',
        'status',
        'deskripsi_status',
        'tanggal_pembayaran',
        'kamar_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'order';

    public static function addAdditionalData(Array $req): Array
    {
        $req['id'] = Uuid::generate()->string;
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();
        $req['user_id'] = Auth::user()->id;
        $req['nama_document_ktp'] = $req['foto_ktp']->getClientOriginalName();

        return $req;
    }
}
