<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_kost',
        'alamat',
        'fasilitas_listrik',
        'fasilitas_air',
        'no_telp',
        'created_at',
        'updated_at',
    ];

    protected $table = 'user';

    public static function addAdditionalData(Array $req, $umkm): Array
    {
        $req['id'] = Uuid::generate()->string;
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();

        return $req;
    }
}
