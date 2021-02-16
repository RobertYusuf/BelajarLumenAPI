<?php

namespace App\Repositories\Auth;

// use App\Models\User;
use App\Repositories\Auth\IAuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;

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

    public function getAuthUser()
    {
        return response()->json(auth()->user());
    }

    public function deleteToken()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();
        }
    }
}
