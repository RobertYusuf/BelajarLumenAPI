<?php

namespace App\Repositories\User;

interface IUserRepository
{
    public function addUser($request);
    public function updateUser($id, $request);
    public function deleteUser($id);
}
