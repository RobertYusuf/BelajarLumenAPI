<?php

namespace App\Repositories\User;

interface IUserRepository
{
    public function addUser($request);
    public function updateUser($request);
    public function deleteUser();
    public function getAllUser();
    // public function getAuthUser($request);

    public function getAuthUser();
    public function deleteToken();
}
