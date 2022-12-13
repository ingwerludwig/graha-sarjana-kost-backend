<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Response\AuthResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    private AuthResponse $response;

    public function __construct(AuthResponse $response){
        $this->response = $response;
    }

    public function register(SignupRequest $request)
    {
        $req = $request->validated();

        $input = User::addAdditionalData($request->validated());
        $user = User::create($input);
        $token = Auth::login($user);

        return $this->response->validTokenResponse($user, $token);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = Auth::attempt($credentials);

        if (!$token)
        {
            return $this->response->unauthorizedLoginResponse();
        }

        $user = Auth::user();

        return $this->response->validTokenResponse($user, $token);
    }

    public function logout()
    {
        try {
            Auth::logout();
            return $this->response->successLogoutResponse();

        } catch (TokenInvalidException) {
            return $this->response->unauthorizedLoginResponse();

        } catch (JWTException) {
            return $this->response->invalidTokenResponse();
        }
    }
    
}
