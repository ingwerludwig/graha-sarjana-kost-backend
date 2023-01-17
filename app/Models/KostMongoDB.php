<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KostMongoDB extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kost';

    protected $fillable = [
        'id',
        'nama_kost',
        'alamat',
        'fasilitas_listrik',
        'fasilitas_air',
        'no_telp',
        'location',
        'created_at',
        'updated_at',
    ];

}
