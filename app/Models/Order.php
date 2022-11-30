<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_penghuni',
        'date_mulai',
        'durasi_kost',
        'metode_pembayaran',
        'bukti_pembayaran',
        'total_harga',
        'status',
        'tanggal_pembayaran',
        'kamar_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'order';

    public static function addAdditionalData(Array $req, $umkm): Array
    {
        $req['id'] = Uuid::generate()->string;
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();

        return $req;
    }
}
