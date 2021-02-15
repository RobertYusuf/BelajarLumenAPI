<?php

namespace App\Repositories\Auth;

// use App\Models\User;
use App\Repositories\Auth\IAuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements IAuthRepository
{
    public function Auth($request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $token;
    }
}
