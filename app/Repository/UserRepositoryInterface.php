<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function getAuthUser();
    public function getUserById($user_id);
}