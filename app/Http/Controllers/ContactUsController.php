<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    public function send(ContactUsRequest $request)
    {
        $req = $request->validated();

        $to = config('mail.from.address');

        try {
            Mail::raw($req['message'], function($message) use ($req, $to) {
                $message->from($req['email']);
                $message->to($to);
                $message->subject('[GRAHA SARJANA KOST - ' . $req['subject'] . ']');
            });

            return response()->json([
                'success' => true,
                'message' => 'Message has been sent successfully.',
            ],200);

        } catch(Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t send your email right now, please try again later.'],
            ],500);
        }
    }
}
