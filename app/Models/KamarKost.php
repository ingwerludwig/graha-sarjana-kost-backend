<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KamarKost extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'fasilitas',
        'kamar_mandi',
        'harga',
        'kost_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'kamar';

    public static function addAdditionalData(Array $req, $umkm): Array
    {
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();

        return $req;
    }
}
