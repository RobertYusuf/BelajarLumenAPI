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
    public function getUser()
    {
        $token = $this->authRepo->getAuthUser();

        // return $this->respondWithToken($token);
        // $books = $this->repository->getAllBook();

        return response()->json([
            "data" => $token
        ]);
    }

    public function deleteTokenUser()
    {
        $data = $this->authRepo->deleteToken();
        return response()->json([
            "Status" => "Token Has Been Deleted"
        ]);
    }
}
