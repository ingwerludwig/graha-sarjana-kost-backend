<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentAdmin extends Model
{
    use HasFactory;

    protected $table = 'payment_admin';

    // cause our id is UUID type, we must disable the auto incrementing from laravel
    public $incrementing = false;

    // this is what we can insert to database using static function create($user)

    protected $fillable = [
        'id',
        'bank_payment',
        'created_at',
        'updated_at',
    ];

    public static function addAdditionalData(Array $req): Array
    {
        $req['created_at'] = Carbon::now();
        $req['updated_at'] = Carbon::now();

        return $req;
    }


}
