<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\IAuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepo;

    public function __construct(IAuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function auth(Request $request)
    {
        $token = $this->authRepo->Auth($request);

        return $this->respondWithToken($token);
    }
}
