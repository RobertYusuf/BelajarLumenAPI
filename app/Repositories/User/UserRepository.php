<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\IUserRepository;

// use Illuminate\Support\Facades\Auth;

class UserRepository implements IUserRepository
{
    public function addUser($request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $plainPassword = $request->password;
            $user->password = app('hash')->make($plainPassword);

            $user->save();
            return $user;
        } catch (\Exception $e) {
            return $user;
        }
    }

    public function updateUser($id, $request)
    {
        $user = User::find($id);
        if (!$user) {
            return $user;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $plainPassword = $request->password;
        $user->password = app('hash')->make($plainPassword);

        $user->save();
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return false;
        }

        $user->delete();

        return true;
    }
}
