<?php

namespace App\Http\Response;

class AuthResponse {

   public function validTokenResponse($user, $token)
   {
        return response()->json([
            'success' => true,
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ],200);
   }

   public function successLogoutResponse()
   {
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out',
        ], 200);
   }

   public function unauthorizedLoginResponse()
   {
        return response()->json([
            'success' => false,
            'errors' => ['Unauthorized'],
        ], 401);
   }

   public function invalidTokenResponse(){
        return response()->json([
            'success' => false,
            'message' => 'Invalid token',
        ], 400);
   }

}
