<?php

namespace App\Models;

use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'status',
        'created_at',
        'updated_at',
    ];


    protected $table = 'kost';

    public static function addAdditionalData(array $req): array
    {
        $req['id'] = Uuid::generate()->string;
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();
        return $req;
    }
}
