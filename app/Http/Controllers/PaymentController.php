<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    //
    public function getLink()
    {
        $SERVER_KEY = strval(env('SERVER_KEY'));
        $API_HOST_BASE_URL = strval(env('API_HOST_BASE_URL'));

        $url = $API_HOST_BASE_URL . '' . "/v1/payment-links";
        $payload =

            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Authorization" => "Basic " . base64_encode("YourServerKey" + ":" . '' . $SERVER_KEY),
                "Accept" => "application/json"
            ])->post($url);
    }
}
