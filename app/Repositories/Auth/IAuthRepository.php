<?php

namespace App\Repositories\Auth;

interface IAuthRepository
{
    public function Auth($request);
    public function getAuthUser();
    public function deleteToken();
}
