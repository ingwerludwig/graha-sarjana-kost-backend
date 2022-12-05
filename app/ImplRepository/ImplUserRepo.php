<?php

namespace App\ImplRepository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\UserRepositoryInterface;

class ImplUserRepo implements UserRepositoryInterface
{
    public function getAuthUser(){
        $user = Auth::user();
        $currentUser = User::where('id',$user->id)->get();
        return $currentUser;
    }
}