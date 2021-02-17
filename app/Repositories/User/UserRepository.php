<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\IUserRepository;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

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
            $user->role = 'Client';
            $user->save();
            return $user;
            // $user = $request->input('user');
            // $email = $request->input('email');
            // $password = Hash::make($request->input('password'));
            // User::create(['user' => $user, 'email' => $email, 'password' => $password]);

            // return response()->json(['stats' => 'success', 'operating' => 'created']);
        } catch (\Exception $e) {
            return response()->json(['stats' => 'Failed', 'operating' => 'Email or User Has been taken']);
        }
    }

    public function updateUser($request)
    {
        $accaount = auth()->user();
        $id = $accaount->id;
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

    public function deleteUser()
    {
        $accaount = auth()->user();
        $id = $accaount->id;
        $user = User::find($id);
        if (!$user) {
            return false;
        }

        $user->delete();

        return response()->json(['User Already Deleted']);
    }

    public function addBook()
    {
    }
    public function deleteBook()
    {
    }
}
