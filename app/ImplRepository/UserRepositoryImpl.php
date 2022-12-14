<?php

namespace App\ImplRepository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\UserRepositoryInterface;

class UserRepositoryImpl implements UserRepositoryInterface
{
    public function getAuthUser(){
        $user = Auth::user();
        $currentUser = User::where('id',$user->id)->get();

        if(!$currentUser || $currentUser==null) 
            return null;
        return $currentUser;
    }

    public function getUserById($user_id){
        $user = User::where('id',$user_id)->get();

        if(!$user || $user==null) 
            return null;
        return $user;
    }
}