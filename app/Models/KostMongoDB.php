<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Carbon\Carbon;
use Webpatser\Uuid\Uuid;

class KostMongoDB extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kost';

    protected $fillable = [
        'id_postgre',
        'nama_kost',
        'alamat',
        'fasilitas_listrik',
        'fasilitas_air',
        'no_telp',
        'location',
        'status',
        'created_at',
        'updated_at',
    ];

    public static function addAdditionalData(array $req, $id): array
    {
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();
        $req['location'] = array(
            'type' => 'Point',
            'coordinates' => [
                (float)$req['long'],
                (float)$req['lat']
            ]
        );
        $req['id_postgre'] = $id;
        $req['status'] = true;

        return $req;
    }
}
