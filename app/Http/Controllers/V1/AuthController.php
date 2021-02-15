<?php

namespace App\Http\Controllers;

use App\Repositories\Book\IAuthRepository;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    protected $repository;

    public function __construct(IAuthRepository $repository)
    {
        $this->repository = $repository;
    }
    public function register(Request $request)
    {
        $auth = $this->repository->getRegister($request);

        return response()->json([
            "data" => $auth
        ]);
    }
}
